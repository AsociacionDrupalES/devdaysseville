<?php

namespace Drupal\dddsvq_sessions\Plugin\Action;

use Drupal\Core\Action\ActionBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\NodeInterface;

/**
 * Provides a 'ApproveSessionAction' action.
 *
 * @Action(
 *  id = "approve_session_action",
 *  label = @Translation("Approve session"),
 *  type = "node",
 * )
 */
class ApproveSessionAction extends ActionBase {

  /**
   * {@inheritdoc}
   */
  public function execute(NodeInterface $entity = NULL) {
    if ($entity->hasField('field_session_status')) {
      $entity->get('field_session_status')->setValue('approved');
      $entity->save();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    $access = $object->status->access('edit', $account, TRUE)
      ->andIf($object->access('update', $account, TRUE));

    return $return_as_object ? $access : $access->isAllowed();
  }

}
