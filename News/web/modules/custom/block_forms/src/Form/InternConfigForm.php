<?php

namespace Drupal\block_forms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form for Intern Tools.
 */
class InternConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['block_forms.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'block_forms_config_form';
  }

  /**
   * Builds the configuration form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('block_forms.settings');

    $form['custom_message'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom Message'),
      '#default_value' => $config->get('custom_message'),
      '#ajax' => [
        'callback' => '::ajaxCallback',
        'event' => 'change',
        'wrapper' => 'message-wrapper',
      ],
    ];

    $form['output'] = [
      '#type' => 'markup',
      '#markup' => '<div id="message-wrapper"><strong>' . ($config->get('custom_message') ?? '') . '</strong></div>',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * AJAX callback to update the message output.
   */
  public function ajaxCallback(array &$form, FormStateInterface $form_state) {
    $text = $form_state->getValue('custom_message');
    $form['output']['#markup'] = '<div id="message-wrapper"><strong>' . $text . '</strong></div>';
    return $form['output'];
  }

  /**
   * Validates the form input.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('custom_message')) < 3) {
      $form_state->setErrorByName('custom_message', $this->t('Message must be at least 3 characters.'));
    }
  }

  /**
   * Submits the form and saves the configuration.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('block_forms.settings')
      ->set('custom_message', $form_state->getValue('custom_message'))
      ->save();

    $this->messenger()->addStatus($this->t('Configuration saved successfully.'));
    parent::submitForm($form, $form_state);
  }

}
