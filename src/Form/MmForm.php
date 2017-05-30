<?php

namespace Drupal\mm\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

//use Drupal\Core\Url;
use Drupal\Core\Routing\TrustedRedirectResponse;

//для возврата с vk на сайт
use Drupal\Core\Url;

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

    $form['group'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('id приложения'),
      '#default_value' => $config->get('mm.group'),
    );  

     $form['id_clienta'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('id клиента'),
      '#default_value' => $config->get('mm.id_clienta'),
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
      ->set('mm.group', $form_state->getValue('group'))
      ->set('mm.id_clienta', $form_state->getValue('id_clienta'))     
      ->save();

     parent::submitForm($form, $form_state);
     
 /*
  
define("SCOPE",     "offline,wall");      

$client_id = \Drupal::config('mm.settings')->get('mm.group');

$vk_url = 
  'https://api.vk.com/oauth/authorize?client_id=' .
  $client_id .
  '&scope=' .
  SCOPE .
  '&redirect_uri=https://api.vk.com/blank.html&display=page&response_type=token' ;


//редирект на гугл.
     $probe_url = new TrustedRedirectResponse($vk_url);
      $form_state->setResponse($probe_url);

*/

     
  }
}

