<?php

namespace Drupal\mm\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Render\Element\Button;

//use Drupal\Core\Routing\TrustedRedirectResponse;


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
   
/*
//отсюда
    define("SCOPE",     "offline,wall");      

$client_id = \Drupal::config('mm.settings')->get('mm.group');

$vk_url = 
  'https://api.vk.com/oauth/authorize?client_id=' .
  $client_id .
  '&scope=' .
  SCOPE .
  '&redirect_uri=https://api.vk.com/blank.html&display=page&response_type=token' ;

$result = file_get_contents($vk_url);
$result = json_decode($result, true);
$access_token = $result['access_token'];
*/


    //$probe_url = new TrustedRedirectResponse($vk_url);
    



   // $client = \Drupal::httpClient();
   // $request = $client->get($vk_url);
   // $response = $request->getBody();

//$my_string = parse_url($response, PHP_URL_FRAGMENT);
//parse_str($my_string, $output);
//$token = $output['access_token'];
//$id_client = $output['user_id'];



/*
    $result = parse_url($response);
   parse_str($result['query'] , $params);
   $token = $params['access_token'] ;
 
 \Drupal::config('mm.settings')
       ->set('mm.token', $token)
       ->save();   

*/
 //досюда 

    // Retrieve the configuration
    $this->config('mm.settings')
      // Set the submitted configuration setting
      ->set('mm.token', $form_state->getValue('token'))     
      ->save();

     parent::submitForm($form, $form_state);
}
}
