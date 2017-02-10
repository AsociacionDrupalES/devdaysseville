<?php
namespace Drupal\dddsvq_sponsors\EventSubscriber;

use Drupal\Core\Session\AccountProxy;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Drupal\Core\Url;

/**
 * Class SponsorsEventSubscriber
 *
 * @package Drupal\dddsvq_sponsors\EventSubscriber
 */
class SponsorsEventSubscriber implements EventSubscriberInterface {

  /**
   * The current_user service
   * @var AccountProxy $current_user
   */
  protected $current_user;

  /**
   * SponsorsEventSubscriber constructor.
   * @param \Drupal\Core\Session\AccountProxy $current_user
   */
  public function __construct(AccountProxy $current_user) {
    $this->current_user = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('onRequest');
    return $events;
  }

  /**
   * If we accessing to the detail page of an sponsor we redirect it to the home
   * page
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   */
  public function onRequest(GetResponseEvent $event) {
    $request = $event->getrequest();

    if ($request->get('exception') != NULL) {
      return;
    }

    // Only check the node type if we are requesting a node page:
    if ($request->attributes->get('_route') === 'entity.node.canonical') {
      if ($request->attributes->get('node')->bundle() == 'sponsor') {
        if (!$this->current_user->hasPermission('view sponsor details')) {
          $url = Url::fromUserInput('/sponsors');
          $response = new RedirectResponse($url->toString());
          $event->setResponse($response);
        }
      }
    }
  }
}
