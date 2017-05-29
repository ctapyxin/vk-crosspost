<?php
 /**
  * @file
  * Contains \Drupal\mm\Controller\MmArticleController.
  * ^ Пишется по следующему типу:
  *  - \Drupal - это указывает что данный файл относится к ядру Drupal, ведь
  *    теперь там еще есть Symfony.
  *  - Mm - название модуля.
  *  - Controller - тип файла. Папка src опускается всегда.
  *  - MmArticleController - название нашего класса.
  */

/**
 * Пространство имен нашего контроллера. Обратите внимание что оно схоже с тем
 * что описано выше, только опускается название нашего класса.
 */
namespace Drupal\mm\Controller;

/**
 * Используем друпальный класс ControllerBase. Мы будем от него наследоваться,
 * а он за нас сделает все обязательные вещи которые присущи всем контроллерам.
 */
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;





/**
 * Объявляем наш класс-контроллер.
 */
class MmArticleController extends ControllerBase {

  /**
   * {@inheritdoc}
   *
   * В Drupal 8 очень многое строится на renderable arrays и при отдаче
   * из данной функции содержимого для страницы, мы также должны вернуть
   * массив который спокойно пройдет через drupal_render().
   */
  public function helloWorld() {
    $output = array();

    $output['#title'] = 'HelloWorld page title';
   
/*вызываем массив node типа artile
    $nids = \Drupal::entityQuery('node')
  ->condition('type', 'article') 
  ->execute();
$nodes = \Drupal::entityTypeManager()
  ->getStorage('node')
  ->loadMultiple($nids);
*/

/*цикл перебора массива с выводом названий статей на страницу сайта
$titles = '';
foreach ($nodes as $node) {
$title = $node->getTitle();

$titles = $titles . '<p>' . $title . '</p>';
}

//var_dump($titles);
   
    $output['#markup'] = t($titles);

*/
//define("SCOPE",     "notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline");      
;

//$token = \Drupal::config('mm.settings')->get('mm.token');
$my_content = $_SESSION['my_content'];
$nid = $_SESSION['nid'];
$site = $_SESSION['site'];
$check_bool = $_SESSION['check_bool'];
$z = $_SESSION['z'];
$title_myCustomField = $_SESSION['title_myCustomField'];

if($my_content == null){
$my_content = 'null';
} 

if($site == null){
$site = 'null';
}
 
if($nid == null){
$nid = 'null';
}
/*
if($check_bool == null){
$check_bool = 'null';
}
*/
$output['#markup'] = 
'<p>' . 'static my_content = ' . $my_content . '</p>' .
'<p>' . 'nid = ' . $nid . '</p>' .
'<p>' . 'site =' . $site . '</p>' .
'<p>' . 'check_bool =' . $z . '</p>' .
'<p>' . 'title_myCustomField' . $title_myCustomField . '</p>'; 

var_dump($check_bool);
 
    return $output;
  }




}
