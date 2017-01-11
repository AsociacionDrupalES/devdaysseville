<?php

namespace Drupal\dddsvq_common\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'KeywordsFooterBlock' block.
 *
 * @Block(
 *  id = "keywords_footer_block",
 *  admin_label = @Translation("Keywords footer block"),
 * )
 */
class KeywordsFooterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['keywords_footer_block']['#theme'] = 'keywords_block';

    return $build;
  }

}
