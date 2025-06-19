<?php

namespace Drupal\weather_widget\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\weather_widget\Service\WeatherService;

/**
 * Provides a 'Weather Widget' Block.
 *
 * @Block(
 *   id = "weather_widget_block",
 *   admin_label = @Translation("Weather Widget Block")
 * )
 */
class WeatherBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The weather service.
   *
   * @var \Drupal\weather_widget\Service\WeatherService
   */
  protected $weatherService;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, WeatherService $weatherService) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->weatherService = $weatherService;
  }

  /**
   * Creates an instance of the block.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('weather_widget.weather_service')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $weather_data = $this->weatherService->getWeatherData();

    if (!$weather_data) {
      return [
        '#markup' => $this->t('Unable to fetch weather data. Please check configuration.'),
      ];
    }

    return [
      '#theme' => 'weather_widget',
      '#weather' => $weather_data,
      '#cache' => [
        'max-age' => 3600,
        'contexts' => ['user'],
      ],
    ];
  }

}
