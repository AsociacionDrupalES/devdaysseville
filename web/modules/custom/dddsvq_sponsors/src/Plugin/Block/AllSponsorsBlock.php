<?php

namespace Drupal\dddsvq_sponsors\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dddsvq_sponsors\SponsorsManager;

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
   * @var \Drupal\dddsvq_sponsors\SponsorsManager
   */
  protected $sponsors_manager;

  /**
   * Construct.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\dddsvq_sponsors\SponsorsManager $sponsors_manager
   * @internal param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    SponsorsManager $sponsors_manager
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->sponsors_manager = $sponsors_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dddsvq_sponsors.manager')
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

    $silver_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_3',
      '#arguments' => [],
    ];
    $bronze_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_4',
      '#arguments' => [],
    ];

    $bull_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_8',
      '#arguments' => [],
    ];

    $food_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_6',
      '#arguments' => [],
    ];

    $social_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_7',
      '#arguments' => [],
    ];

    $coffee_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_5',
      '#arguments' => [],
    ];

    $partner_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_9',
      '#arguments' => [],
    ];

    $media_partner_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_10',
      '#arguments' => [],
    ];

    $special_partner_sponsors = [
      '#type' => 'view',
      '#name' => 'sponsors',
      '#display_id' => 'block_11',
      '#arguments' => [],
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
      ],
      'special_partner' => [
        '#theme' => 'sponsors',
        '#title' => 'With the special collaboration',
        '#sponsor_type' => 'bronze',
        '#sponsors' => $special_partner_sponsors,
      ],
      'partner' => [
        '#theme' => 'sponsors',
        '#title' => 'Partners',
        '#sponsor_type' => 'bronze',
        '#sponsors' => $partner_sponsors,
      ],
      'media_partner' => [
        '#theme' => 'sponsors',
        '#title' => 'Media partners',
        '#sponsor_type' => 'bronze',
        '#sponsors' => $media_partner_sponsors,
      ],
      'food_sponsors' => [
        '#theme' => 'sponsors',
        '#title' => 'Food sponsors',
        '#sponsor_type' => 'silver',
        '#sponsors' => $food_sponsors,
      ],
      'bull' => [
        '#theme' => 'sponsors',
        '#title' => 'Bull sponsors',
        '#sponsor_type' => 'silver',
        '#sponsors' => $bull_sponsors,
      ],
      'social_event' => [
        '#theme' => 'sponsors',
        '#title' => 'Social event sponsors',
        '#sponsor_type' => 'silver',
        '#sponsors' => $social_sponsors,
      ],
      'coffee' => [
        '#theme' => 'sponsors',
        '#title' => 'Coffee sponsors',
        '#sponsor_type' => 'bronze',
        '#sponsors' => $coffee_sponsors,
      ],
    ];

    return $build;
  }

}
