<?php

namespace Drupal\mm\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure mm settings for this site.
 */
class MmForm extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mm_for_setting';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'mm.settings',
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('mm.settings');

    $form['things'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('просто Things'),
      '#default_value' => $config->get('mm.things'),
    );  

    $form['other_things'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('сложно Other things'),
      '#default_value' => $config->get('mm.other_things'),
    );  

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    $this->config('mm.settings')
      // Set the submitted configuration setting
      ->set('mm.things', $form_state->getValue('things'))
      // You can set multiple configurations at once by making
      // multiple calls to set()
      ->set('mm.other_things', $form_state->getValue('other_things'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}

