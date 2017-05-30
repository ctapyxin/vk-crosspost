<?php

namespace Drupal\vk_crosspost\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

//use Drupal\Core\Url;
use Drupal\Core\Routing\TrustedRedirectResponse;

//для возврата с vk на сайт
use Drupal\Core\Url;

/**
 * Configure vk_crosspost settings for this site.
 */
class vk_crosspostForm extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'vk_crosspost_for_setting';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'vk_crosspost.settings',
    ];
  }

 


  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('vk_crosspost.settings');

    $form['group'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('id приложения'),
      '#default_value' => $config->get('vk_crosspost.group'),
    );  

     $form['id_clienta'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('id клиента'),
      '#default_value' => $config->get('vk_crosspost.id_clienta'),
    );

    return parent::buildForm($form, $form_state);
  }


 



  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
 

    
    
  

    // Retrieve the configuration
    $this->config('vk_crosspost.settings')
      // Set the submitted configuration setting
      ->set('vk_crosspost.group', $form_state->getValue('group'))
      ->set('vk_crosspost.id_clienta', $form_state->getValue('id_clienta'))     
      ->save();

     parent::submitForm($form, $form_state);
     
 /*
  
define("SCOPE",     "offline,wall");      

$client_id = \Drupal::config('vk_crosspost.settings')->get('vk_crosspost.group');

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

