<?php

namespace Drupal\intern_tools\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides a controller for the Intern Tools module.
 */
class InternToolsController extends ControllerBase {

  /**
   * Returns a simple admin page.
   */
  public function adminPage() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Welcome to the Intern Tools admin page!'),
    ];
  }

}
