<?php

namespace Drupal\dddsvq_common\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'FooterBlock' block.
 *
 * @Block(
 *  id = "footer_block",
 *  admin_label = @Translation("Footer block"),
 * )
 */
class FooterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['footer_block'] = [
      '#markup' => $this->t('500 anniversary of first circumnavigation of the globe'),
    ];
    $build['footer_social'] = [
      '#theme' => 'social_networks',
      '#networks' => [
        'twitter' => 'https://twitter.com/drupaldevdays',
        'facebook' => 'https://www.facebook.com/drupaldevdays',
      ]
    ];

    return $build;
  }

}
