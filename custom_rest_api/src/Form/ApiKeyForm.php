<?php

/**
 * @file
 * Contains \Drupal\custom_rest_api\Form\ApiKeyForm.
 */

namespace Drupal\custom_rest_api\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiKeyForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */

  public function getFormId() {

    return 'api_config_form';
  }

  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = parent::buildForm($form, $form_state);
    $config = $this->config('custom_rest_api.settings');
    $get_key = $config->get('api_key');
    $form['key'] = [  // create a field set.
      '#type' => 'details',
      '#title' => 'Custom Field',
      '#open' => TRUE,
    ];
    $form['key']['api_key'] = [
      '#type' => 'textfield',
      '#title' => 'API Key',
      // Set Default api key in field,
      // if api key not set No API key yet value has been set.
      '#default_value' => $get_key ?: 'No API Key yet',
      '#description' => $this->t("Please Enter API Key without space."),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $config = $this->config('custom_rest_api.settings');
    $key = $form_state->getValue('api_key');
    if(strlen($key) >= 16) {
      $form_state->setErrorByName('api_key', t('Enter 16 charchter only.'));
    }

    return parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    //print_r($form_state->getValues());die;
    $apikey = str_replace(' ', '', $form_state->getValue('apikey'));
    $config = $this->config('custom_rest_api.settings');
    $config->set('api_key', str_replace(' ','',$form_state->getValue('api_key')));
    $config->save();

    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */

  protected function getEditableConfigNames() {

    return [

      'custom_rest_api.settings',

    ];
  }

}
