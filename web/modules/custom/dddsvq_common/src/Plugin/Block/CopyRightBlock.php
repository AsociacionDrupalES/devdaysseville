<?php

namespace Drupal\dddsvq_common\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CopyRightBlock' block.
 *
 * @Block(
 *  id = "copy_right_block",
 *  admin_label = @Translation("Copy right block"),
 * )
 */
class CopyRightBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['copy_right_block'] = [
      '#theme' => 'copyright_block',
    ];

    return $build;
  }

}
