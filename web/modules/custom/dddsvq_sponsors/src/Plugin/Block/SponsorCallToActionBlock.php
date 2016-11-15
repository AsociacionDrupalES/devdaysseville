<?php

namespace Drupal\dddsvq_sponsors\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\State\StateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'SponsorCallToActionBlock' block.
 *
 * @Block(
 *  id = "sponsor_call_to_action_block",
 *  admin_label = @Translation("Sponsor call to action block"),
 * )
 */
class SponsorCallToActionBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The State API service.
   *
   * @var \Drupal\Core\State\StateInterface
   */
  protected $state;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entity_type_manager;


  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, StateInterface $state, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->state = $state;
    $this->entity_type_manager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition,
      $container->get('state'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'call_to_action_page' => 'Call to action default text',
      'call_to_action_link_text' => 'link to become a sponsor page',
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['call_to_action_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Main text'),
      '#default_value' => $this->configuration['call_to_action_text'],
    ];

    $form['call_to_action_link_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Call to action link text'),
      '#required' => TRUE,
      '#default_value' => $this->configuration['call_to_action_link_text'],
    ];

    $form['call_to_action_page'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'node',
      '#required' => TRUE,
      '#title' => $this->t('Become a sponsor page reference'),
    ];

    $page_ref_value = $this->state->get('sponsors.call_to_action_page', 0);
    if (!empty($page_ref_value)) {
      $form['call_to_action_page'] += [
        '#default_value' => $this->entity_type_manager->getStorage('node')
          ->load($page_ref_value),
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['call_to_action_text'] = $form_state->getValue('call_to_action_text');
    $this->configuration['call_to_action_link_text'] = $form_state->getValue('call_to_action_link_text');
    $this->state->set('sponsors.call_to_action_page', $form_state->getValue('call_to_action_page')['target_id']);
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['sponsor_call_to_action'] = [
      '#theme' => 'sponsor_call_to_action',
      '#text' => $this->configuration['call_to_action_text'],
    ];

    $call_to_action_page_id = $this->state->get('sponsors.call_to_action_page', 0);
    if (!empty($call_to_action_page_id)) {
      $link = Url::fromRoute('entity.node.canonical', ['node' => $call_to_action_page_id]);
      $build['sponsor_call_to_action']['#link'] = [
        '#type' => 'link',
        '#title' => $this->configuration['call_to_action_link_text'],
        '#url' => $link,
        '#attributes' => ['class' => ['button']],
      ];
    }

    return $build;
  }
}
