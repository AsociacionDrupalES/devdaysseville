<?php

namespace Drupal\dddsvq_sponsors\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'AllSponsorsBlock' block.
 *
 * @Block(
 *  id = "all_sponsors_block",
 *  admin_label = @Translation("All sponsors block"),
 * )
 */
class AllSponsorsBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The Entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entity_type_manager;

  /**
   * Construct.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    EntityTypeManagerInterface $entity_type_manager
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entity_type_manager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function build() {
    $platinum_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_1',
      '#arguments' => [],
    ];

    $gold_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_2',
      '#arguments' => [],
    ];

    $storage = $this->entity_type_manager->getStorage('node');
    $nodes = $storage->loadByProperties([
      'field_sponsorship_type' => 3,
      'status' => 1,
    ]);

    $silver_sponsors = [
      '#theme' => 'rotation_entity',
      '#level' => 'silver',
      '#entities' => $this->entity_type_manager
        ->getViewBuilder('node')
        ->viewMultiple($nodes, 'silver_sponsor'),
      '#attached' => ['library' => ['dddsvq_sponsors/sponsors.carousel']],
    ];

    $nodes = $storage->loadByProperties([
      'field_sponsorship_type' => 4,
      'status' => 1,
    ]);
    $bronze_sponsors = [
      '#theme' => 'rotation_entity',
      '#level' => 'bronze',
      '#entities' => $this->entity_type_manager
        ->getViewBuilder('node')
        ->viewMultiple($nodes, 'bronze_sponsor'),
      '#attached' => ['library' => ['dddsvq_sponsors/sponsors.carousel']],
    ];

    $build = [
      '#theme_wrappers' => ['sponsors_wrapper'],
      'platinum' => [
        '#theme' => 'sponsors',
        '#title' => 'Platinum sponsors',
        '#sponsor_type' => 'platinum',
        '#sponsors' => $platinum_sponsors,
      ],
      'gold' => [
        '#theme' => 'sponsors',
        '#title' => 'Gold sponsors',
        '#sponsor_type' => 'gold',
        '#sponsors' => $gold_sponsors,
      ],
      'silver' => [
        '#theme' => 'sponsors',
        '#title' => 'Silver sponsors',
        '#sponsor_type' => 'silver',
        '#sponsors' => $silver_sponsors,
      ],
      'bronze' => [
        '#theme' => 'sponsors',
        '#title' => 'Bronze sponsors',
        '#sponsor_type' => 'bronze',
        '#sponsors' => $bronze_sponsors,
      ]
    ];

    return $build;
  }

}
