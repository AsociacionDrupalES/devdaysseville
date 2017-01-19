<?php

namespace Drupal\dddsvq_home\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DevDaysAboutHomeBlock' block.
 *
 * @Block(
 *  id = "dev_days_about_home_block",
 *  admin_label = @Translation("Dev days about home block"),
 * )
 */
class DevDaysAboutHomeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['dev_days_about_home_block']['#theme'] = 'about_home_block';

    return $build;
  }

}
