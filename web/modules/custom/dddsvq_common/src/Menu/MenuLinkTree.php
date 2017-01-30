<?php

namespace Drupal\dddsvq_common\Menu;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Menu\MenuLinkTree as MenuLinkTreeCore;

/**
 * Override \Drupal\Core\Menu\MenuLinkTree.
 *
 */
class MenuLinkTree extends MenuLinkTreeCore {
  /**
   * {@inheritdoc}
   */
  protected function createInstances(array $data_tree) {
    $tree = parent::createInstances($data_tree);
    foreach ($tree as $key => $element) {
      $url = $element->link->getUrlObject();
      if ($url->isRouted()) {
        $route_name = $url->getRouteName();
        if ($route_name == 'node.add' && $url->getRouteParameters()['node_type'] == 'session') {
          $tree[$key]->access = AccessResult::allowed();
        }
      }
    }
    return $tree;
  }
}
