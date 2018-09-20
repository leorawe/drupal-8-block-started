<?php

namespace Drupal\myblock\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines MyBlockController class.
 */
class MyBlockController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Some great block will go here - leoraw wrote this'),
    ];
  }

}
