<?php

/*
логика модуля:

1. Если на статье стоит отметка *True* в пользователском поле (vk field) , то осуществляется кросспостинг в vk.
*/


function changeKrossPossing() {
if 
}


//for  redirect in vk
//use Drupal\Core\Routing\TrustedRedirectResponse;
//use Symfony\Component\HttpFoundation\RedirectResponse; 
//use Zend\Diactoros\Response\RedirectResponse;



/*
_controller: '\Drupal\mm\Controller\MmArticleController::redirectToVk'
*/

public function redirectToVk(){
  //my code
    
    define("SCOPE",     "offline,wall");      

$client_id = \Drupal::config('mm.settings')->get('mm.group');

$vk_url = 
  'http://api.vkontakte.ru/oauth/authorize?client_id=' .
  $client_id .
  '&scope=' .
  SCOPE .
  '&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token' ;

   //return  new RedirectResponse($vk_url);
   return new TrustedRedirectResponse($vk_url);
 /*   
   if (!empty($_GET['response_type'])){
   $this->config('mm.settings')
      // Set the submitted configuration setting
      ->set('mm.token', $form_state->getValue('token'))     
      ->save(); 
   } */
 
  }]

use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;
use Drupal\Core\Entity\EntityInterface;
// если поле существует и истина делаем кросспост статьи
function mm_node_presave(NodeInterface $node) {
  if ($node->bundle() == 'article' and $node->hasField('my_logic_field') and $node->get('my_logic_field')->value) {
   

    $linc_post = 
'https://api.vk.com/method/wall.post?owner_id=' . 
\Drupal::config('mm.settings')->get('mm.group') .
'&friends_only=' .
'' .
'&from_group=' .
'0' .
'&message=' .
$node->getTitle() .
'&attachments=' .
'' .
'&access_token=' .
\Drupal::config('mm.settings')->get('mm.token');



return \Drupal::request()->query->get($linc_post);
} else {
  return echo 'not work IF';
  }

}


///////////////////
с файла mm.module

//получение токена (автоматизированно)
/*
 * http://api.vkontakte.ru/oauth/authorize?client_id=
 * &scope=&redirect_uri=http://api.vk.com/blank.html&response_type= 
 *
 *  $client_id - id приложения
 * 
 *  scope запрашиваемые права
 * 
 *  redirect_uri ссылка для возврата ответа сервера 
 *  http://api.vk.com/blank.html
 * 
 *  response_type  это и есть access_token
 *
 * */

$linc_auth = 
'http://api.vkontakte.ru/oauth/authorize?client_id=' .
CLIENT_ID .
'&scope=' .
$massive_scope .
'&redirect_uri=http://api.vk.com/blank.html&response_type=' ;

//кросспостинг
/*
 https://api.vk.com/method/wall.post?owner_id=&friends_only=&from_group=
 * &message=&attachments=&access_token= 
 * 
 * OWNER_ID - постоянная , идентификатор пользователя
 * 
 * $friends_only - 1 запись доступна только друзьям
 *                 0 всем пользователям
 * 
 * $from_group - если owner_id < 0 (запись публикуется на стене группы)
 *                             = 1 (запись опубликована от имени группы)
 *                             = 0 по умолчанию от имени пользователя
 * 
 * $message  текст сообщения
 * 
 * attachments -список объектов, приложенных к записи и разделенные 
 * символом ',' : <owner_id>_<media_id>,<owner_id>_<media_id>
 * <owner_id> — идентификатор владельца медиа-приложения
   <media_id> — идентификатор медиа-приложения
  */   
  
   
$linc_post = 
'https://api.vk.com/method/wall.post?owner_id=' . 
OWNER_ID .
'&friends_only=' .
$friends_only .
'&from_group=' .
$from_group .
'&message=' .
$message .
'&attachments=' .
$massivAttach .
'&access_token=' .
$access_token;

echo '';

/* parse_url('answer_vk') -вычленяем запрос из url
   parse_str('query',$result_massive)
https://ru.stackoverflow.com/questions/149758/%D0%A0%D0%B0%D0%B7%D0%B1%D0%B8%D1%82%D1%8C-url-%D0%BD%D0%B0-%D0%BC%D0%B0%D1%81%D1%81%D0%B8%D0%B2-%D0%BF%D0%B0%D1%80%D0%B0%D0%BC%D0%B5%D1%82%D1%80%D0%BE%D0%B2-%D0%B8-%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B9
*/
$result = parse_url('url_from_vk');

pars_str($result['query'] , $params);

$token = $params['response_type'] ;

