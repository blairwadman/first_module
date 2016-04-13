<?php
/**
 * @file
 * Contains \Drupal\first_module\Plugin\Block\HelloBlock.
 */

namespace Drupal\first_module\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 * )
 */
class HelloBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('@welcome_message', array('@welcome_message' => $this->configuration['welcome_message'])),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'welcome_message' => 'Hello world',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form['welcome_message'] = [
      '#type' => 'textfield',
      '#title' => t('Welcome message'),
      '#default_value' => $this->configuration['welcome_message'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $this->configuration['welcome_message'] = $form_state->getValue('welcome_message');
  }

}