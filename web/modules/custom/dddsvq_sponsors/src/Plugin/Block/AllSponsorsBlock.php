<?php

namespace Drupal\dddsvq_sponsors\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'AllSponsorsBlock' block.
 *
 * @Block(
 *  id = "all_sponsors_block",
 *  admin_label = @Translation("All sponsors block"),
 * )
 */
class AllSponsorsBlock extends BlockBase {


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

    $silver_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_3',
      '#arguments' => [],
    ];

    $bronze_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_4',
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
      'silver' => [
        '#theme' => 'sponsors',
        '#title' => 'Silver sponsors',
        '#sponsor_type' => 'silver',
        '#sponsors' => $silver_sponsors,
      ],
      'bronze' => [
        '#theme' => 'sponsors',
        '#title' => 'Bronze sponsors',
        '#sponsor_type' => 'bronze',
        '#sponsors' => $bronze_sponsors,
      ]
    ];

    return $build;
  }

}
