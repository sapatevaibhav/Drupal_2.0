<?php

namespace Drupal\computed_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'computed_fields_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "computed_fields_formatter",
 *   label = @Translation("Article Count Formatter"),
 *   field_types = {
 *     "computed_articles_count"
 *   }
 * )
 */
class ComputedArticlesCountFormatter extends FormatterBase {

  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $entity = $items->getEntity();

    // This is the Author node.
    if ($entity && $entity->getEntityTypeId() === 'node' && $entity->bundle() === 'author') {
      $author_id = $entity->id();

      // Now fetch all articles that reference this Author node.
      $count = \Drupal::entityQuery('node')
        ->accessCheck(FALSE)
        ->condition('type', 'article')
        ->condition('status', 1)
        ->condition('field_author.target_id', $author_id)
        ->count()
        ->execute();

      $elements[] = [
        '#markup' => $this->t('@count articles', ['@count' => $count]),
      ];
    }

    return $elements;
  }
}
