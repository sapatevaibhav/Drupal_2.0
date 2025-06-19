<?php

namespace Drupal\block_forms\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Cache\Cache;

/**
 * Provides a block showing the current user.
 *
 * @Block(
 *   id = "intern_block",
 *   admin_label = @Translation("Intern Block"),
 * )
 */
class InternBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_user = \Drupal::currentUser();
    $config = \Drupal::config('block_forms.settings');

    return [
      '#markup' => $this->t('Hello @name! Configured Message: @msg', [
        '@name' => $current_user->getDisplayName(),
        '@msg' => $config->get('custom_message') ?? 'No message set.',
      ]),
      '#cache' => [
        'contexts' => ['user'],
        'tags' => ['config:block_forms.settings'],
        'max-age' => Cache::PERMANENT,
      ],
    ];
  }

}
