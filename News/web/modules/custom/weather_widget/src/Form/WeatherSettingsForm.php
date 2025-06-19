<?php

namespace Drupal\weather_widget\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form to configure the Weather Widget settings.
 */
class WeatherSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'weather_widget_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['weather_widget.settings'];
  }

  /**
   * Builds the configuration form for the Weather Widget.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('weather_widget.settings');

    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API Key'),
      '#default_value' => $config->get('api_key'),
      '#required' => TRUE,
    ];

    $form['location'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Default Location'),
      '#default_value' => $config->get('location'),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * Submits the configuration form for the Weather Widget.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('weather_widget.settings')
      ->set('api_key', $form_state->getValue('api_key'))
      ->set('location', $form_state->getValue('location'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
