<?php

/**
     * @file
     * Contains \Drupal\mm\Plugin\Field\FieldType\logicField
     */

namespace Drupal\mm\Plugin\Field\FieldType;



    use Drupal\Core\Field\FieldItemBase;
    use Drupal\Core\Field\FieldStorageDefinitionInterface;
    use Drupal\Core\TypedData\DataDefinition;
    use Drupal\Core\Field\Plugin\Field\FieldType\BooleanItem




/**
*
* @FieldType(
*   id = "mylogicfield",
*   label = @Translation("logical crosspost in VK"),
*   module = "mm",
*   description = @Translation("trying make crossposting from drupal in VK"),
*   default_widget = "boolean_checkbox",
*   default_formatter = "boolean",
* )
*/

class LogicField extends FieldItemBase  {
/*
 public static function defaultFieldSettings() {
    return [
      'on_label' => new TranslatableMarkup('On'),
      'off_label' => new TranslatableMarkup('Off'),
    ] + parent::defaultFieldSettings();
  }
 
 public static function schema (FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'int',
          'size' => 'tiny',
        ],
      ],
    ];
  }

public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }     

      public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
     $properties['value'] = DataDefinition::create('boolean')
    ->setLabel(t('Boolean value'))
    ->setRequired(TRUE);

  return $properties; 
      }

*   default_widget = "mmWidget",
     *   default_formatter = "mmFormatter",

*   default_widget = "boolean_checkbox",
     *   default_formatter = "boolean", 

 */    

}




