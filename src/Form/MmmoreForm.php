<?php

namespace Drupal\mm\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Render\Element\Button;

use Drupal\Core\Routing\TrustedRedirectResponse;


class MmmoreForm extends ConfigFormBase {
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
   //   '#type' => 'textfield',
      '#title' => $this->t('token s vk'),
    //  '#default_value' => 'poka pusto',
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
      ->set('mm.token', '')     
      ->save();

     parent::submitForm($form, $form_state);

define("SCOPE",     "offline,wall");      

$client_id = \Drupal::config('mm.settings')->get('mm.group');

$vk_url = 
  'https://api.vk.com/oauth/authorize?client_id=' .
  $client_id .
  '&scope=' .
  SCOPE .
  '&redirect_uri=https://api.vk.com/blank.html&display=page&response_type=token' ;


//редирект на vk.
     $probe_url = new TrustedRedirectResponse($vk_url);
      $form_state->setResponse($probe_url);

}
}
