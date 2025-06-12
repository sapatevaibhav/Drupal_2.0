<?php

namespace Drupal\computed_fields\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'computed_fields' field type.
 *
 * @FieldType(
 *   id = "computed_articles_count",
 *   label = @Translation("Author Article Count"),
 *   description = @Translation("Displays number of articles for an author."),
 *   default_formatter = "computed_fields_formatter"
 * )
 */
class ComputedArticlesCount
 extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    // Computed fields do not need database schema.
    return [];
  }

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('integer')
      ->setLabel(t('Article Count'))
      ->setComputed(TRUE)
      ->setReadOnly(TRUE);
    return $properties;
  }

  public function isEmpty() {
    return FALSE;
  }

}
