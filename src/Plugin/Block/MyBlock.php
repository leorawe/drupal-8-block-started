<?php

namespace Drupal\myblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'MyBlock' Block.
 *
 * @Block(
 *   id = "myblock",
 *   admin_label = @Translation("My block"),
 *   category = @Translation("leoraw stuff"),
 * )
 */

class MyBlock extends BlockBase  {

    /**
     * {@inheritdoc}
     *
    *public function build() {
    *  return array(
     *   '#markup' => $this->t('Great new block - leoraw did this'),
    *  );
   * }
    */

/**
   * {@inheritdoc}
   *
   * This method sets the block default configuration. This configuration
   * determines the block's behavior when a block is initially placed in a
   * region. Default values for the block configuration form should be added to
   * the configuration array. System default configurations are assembled in
   * BlockBase::__construct() e.g. cache setting and block title visibility.
   *
   * @see \Drupal\block\BlockBase::__construct()
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('myblock.settings');
    
    return [
    //'myblock_settings' => $this->t('A default value. This block was created at %time', ['%time' => date('c')]),
    'myblock_settings' => $default_config->get('settings.myblock'),
    ];
  }


  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['myblock_settings'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('What'),
      '#description' => $this->t('What goes in block'),
      '#default_value' => isset($config['myblock_settings']) ? $config['myblock_settings'] : ''
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['myblock_settings'] = $values['myblock_settings'];
  }


  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->configuration['myblock_settings'],
    ];
  }
  
  }