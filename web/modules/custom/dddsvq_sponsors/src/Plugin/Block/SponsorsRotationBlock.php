<?php

namespace Drupal\dddsvq_sponsors\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'SponsorsRotationBlock' block.
 *
 * @Block(
 *  id = "sponsors_rotation_block",
 *  admin_label = @Translation("Sponsors rotation block"),
 * )
 */
class SponsorsRotationBlock extends BlockBase implements ContainerFactoryPluginInterface {

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
  public function defaultConfiguration() {
    return [
         'sponsorship_level' => 1,
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['sponsorship_level'] = [
      '#type' => 'select',
      '#title' => $this->t('Sponsorship level'),
      '#options' => $this->getSponsorOptions(),
      '#default_value' => $this->configuration['sponsorship_level'],
      '#size' => 5,
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['sponsorship_level'] = $form_state->getValue('sponsorship_level');
  }

  /**
   * Return the possible sponsorship level options.
   *
   * @return array
   */
  protected function getSponsorOptions() {
    return [
      1 => $this->t('Platinum'),
      2 => $this->t('Gold'),
      3 => $this->t('Silver'),
      4 => $this->t('Bronze'),
      5 => $this->t('Coffee'),
      6 => $this->t('Lunch'),
      7 => $this->t('Code Sprint'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $storage = $this->entity_type_manager->getStorage('node');
    $nodes = $storage->loadByProperties([
      'field_sponsorship_type' => $this->configuration['sponsorship_level'],
      'status' => 1,
    ]);

    if (!empty($nodes)) {
      $build['rotation_sponsors'] = [
        '#theme' => 'rotation_entity',
        '#entities' => $this->entity_type_manager
          ->getViewBuilder('node')
          ->viewMultiple($nodes, 'teaser'),
        '#attached' => ['library' => ['dddsvq_sponsors/sponsors.carousel']],
      ];
    }
    return $build;
  }
}
