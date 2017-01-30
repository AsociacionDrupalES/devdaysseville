<?php

namespace Drupal\dddsvq_common;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Class CommonServiceProvider.
 */
class DddsvqCommonServiceProvider extends ServiceProviderBase {
  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $definition = $container->getDefinition('menu.link_tree');
    $definition->setClass('Drupal\dddsvq_common\Menu\MenuLinkTree');
  }
}
