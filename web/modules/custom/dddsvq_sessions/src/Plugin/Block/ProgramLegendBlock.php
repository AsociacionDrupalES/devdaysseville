<?php

namespace Drupal\dddsvq_sessions\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ProgramLegendBlock' block.
 *
 * @Block(
 *  id = "program_legend_block",
 *  admin_label = @Translation("Program legend block"),
 * )
 */
class ProgramLegendBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['program_legend_block'] = [
      '#theme' => 'program_legend',
    ];

    return $build;
  }

}
