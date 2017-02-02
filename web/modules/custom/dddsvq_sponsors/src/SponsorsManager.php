<?php

namespace Drupal\dddsvq_sponsors;

use Drupal\Core\Entity\EntityTypeManager;

/**
 * Class SponsorsManager.
 *
 * @package Drupal\dddsvq_sponsors
 */
class SponsorsManager {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entity_type_manager;

  /**
   * @var array
   */
  protected static $sponsorship_levels = [
    'platinum' => 1,
    'gold' => 2,
    'silver' => 3,
    'bronze' => 4,
    'coffee' => 5,
    'food' => 6,
    'social' => 7,
  ];

  /**
   * Constructor.
   */
  public function __construct(EntityTypeManager $entityTypeManager) {
    $this->entity_type_manager = $entityTypeManager;
  }

  /**
   * @param $level
   * @return \Drupal\Core\Entity\EntityInterface[]
   */
  public function getSponsorsByLevel($level) {
    $storage = $this->entity_type_manager->getStorage('node');

    $nodes = $storage->loadByProperties([
      'field_sponsorship_type' => $this->getSponsorshipLevelId($level),
      'status' => 1,
    ]);

    return $nodes;
  }

  /**
   * Retrieve a renderable array of sponsors with the given $level and $view_mode.
   *
   * @param string $level
   * @param $view_mode
   * @return
   */
  public function getRenderableSponsorsByLevel($level, $view_mode) {
    $nodes_renderer = $this->entity_type_manager
      ->getViewBuilder('node')
      ->viewMultiple($this->getSponsorsByLevel($level), $view_mode);

    return $nodes_renderer;
  }

  /**
   * Retrieve the sponsorship level ID defined at ::sponsorship_levels.
   *
   * @param $label
   * @return mixed
   * @throws \Exception
   */
  protected function getSponsorshipLevelId($label) {
    if (!isset(self::$sponsorship_levels[$label])) {
      throw new \Exception('Trying to access to a none existing sponsorship level type.');
    }
    return self::$sponsorship_levels[$label];
  }

}
