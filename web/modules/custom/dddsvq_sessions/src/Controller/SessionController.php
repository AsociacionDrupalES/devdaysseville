<?php

namespace Drupal\dddsvq_sessions\Controller;

use Drupal\node\Controller\NodeController;
use Drupal\node\NodeTypeInterface;

class SessionController extends NodeController {

  /**
   * {@inheritdoc}
   */
  public function addPageTitle(NodeTypeInterface $node_type) {
    if ($node_type->id() == 'session') {
      return $this->t('Submit a @name', array('@name' => $node_type->label()));
    }

    return parent::addPageTitle($node_type);
  }

}
