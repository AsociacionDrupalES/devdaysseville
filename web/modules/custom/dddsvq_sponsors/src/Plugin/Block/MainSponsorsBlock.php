<?php

namespace Drupal\dddsvq_sponsors\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'MainSponsorsBlock' block.
 *
 * @Block(
 *  id = "main_sponsors_block",
 *  admin_label = @Translation("Main sponsors block"),
 * )
 */
class MainSponsorsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $platinum_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_1',
      '#arguments' => [],
    ];

    $gold_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_2',
      '#arguments' => [],
    ];

    $build = [
      '#theme_wrappers' => ['sponsors_wrapper'],
      'platinum' => [
        '#theme' => 'sponsors',
        '#title' => 'Platinum sponsors',
        '#sponsor_type' => 'platinum',
        '#sponsors' => $platinum_sponsors,
      ],
      'gold' => [
        '#theme' => 'sponsors',
        '#title' => 'Gold sponsors',
        '#sponsor_type' => 'gold',
        '#sponsors' => $gold_sponsors,
      ],
      '#cache' => [
        'contexts' => ['url.path']
      ]
    ];

    return $build;
  }
}
