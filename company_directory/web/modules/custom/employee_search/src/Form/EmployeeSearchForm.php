<?php

namespace Drupal\employee_search\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EmployeeSearchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'employee_search_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Employee Name'),
      '#size' => 30,
    ];

    // Department dropdown
    $departments = \Drupal::entityTypeManager()
      ->getStorage('node')
      ->loadByProperties(['type' => 'department']);

    $department_options = ['' => $this->t('- Any Department -')];
    foreach ($departments as $dept) {
      $department_options[$dept->id()] = $dept->label();
    }

    $form['department'] = [
      '#type' => 'select',
      '#title' => $this->t('Department'),
      '#options' => $department_options,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Search'),
    ];

    // Display results if available
    if ($results = $form_state->get('results')) {
      $form['results'] = [
        '#type' => 'markup',
        '#markup' => $results,
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $department_nid = $form_state->getValue('department');

    $query = \Drupal::entityQuery('node')
      ->accessCheck(TRUE)
      ->condition('type', 'employee')
      ->condition('status', 1);

    if (!empty($name)) {
      $query->condition('title', '%' . $name . '%', 'LIKE');
    }

    if (!empty($department_nid)) {
      $query->condition('field_department.target_id', $department_nid);
    }

    $nids = $query->execute();
    $results = '';

    if ($nids) {
      $nodes = Node::loadMultiple($nids);
      $items = [];
      foreach ($nodes as $node) {
        $items[] = $node->toLink()->toString();
      }
      $results = '<div class="employee-search-results"><ul><li>' . implode('</li><li>', $items) . '</li></ul></div>';
    }
    else {
      $results = '<p>' . $this->t('No matching employees found.') . '</p>';
    }

    $form_state->setRebuild();
    $form_state->set('results', $results);
  }
}
