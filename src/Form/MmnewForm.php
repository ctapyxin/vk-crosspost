<?php

namespace Drupal\mm\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


class MmnewForm extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mm_fornew_setting';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'mm.settings',
    ];
  }
 public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('mm.settings');

    $form['token'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('token s vk'),
      '#default_value' => $config->get('mm.token'),
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
      ->set('mm.token', $form_state->getValue('token'))     
      ->save();

     parent::submitForm($form, $form_state);

}
}
