<?php

namespace Drupal\dddsvq_common\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Render\Renderer;

/**
 * Provides a 'NewsletterBlock' block.
 *
 * @Block(
 *  id = "newsletter_block",
 *  admin_label = @Translation("Newsletter block"),
 * )
 */
class NewsletterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['newsletter_block']['#theme'] = 'newsletter_block';

    return $build;
  }

}
