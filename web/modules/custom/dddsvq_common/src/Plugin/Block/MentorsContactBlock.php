<?php

namespace Drupal\dddsvq_common\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'MentorsContactBlock' block.
 *
 * @Block(
 *  id = "mentors_contact_block",
 *  admin_label = @Translation("Mentors contact form message block"),
 * )
 */
class MentorsContactBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'message_text' => '',
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['message_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#default_value' => $this->configuration['message_text'],
    ];
    
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['message_text'] = $form_state->getValue('message_text');

    parent::blockSubmit($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['message'] = [
      '#theme' => 'mentors_contact_block',
      '#message' => $this->configuration['message_text'],
    ];

    return $build;
  }
}
