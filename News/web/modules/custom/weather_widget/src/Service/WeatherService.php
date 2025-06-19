<?php

namespace Drupal\weather_widget\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use GuzzleHttp\ClientInterface;
use Drupal\Core\Cache\CacheBackendInterface;

/**
 * Service to fetch weather data from an external API.
 */
class WeatherService {

  /**
   * The HTTP client for making API requests.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * The configuration factory for accessing module settings.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The cache backend for storing weather data.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cache;

  public function __construct(ClientInterface $http_client, ConfigFactoryInterface $config_factory, CacheBackendInterface $cache) {
    $this->httpClient = $http_client;
    $this->configFactory = $config_factory;
    $this->cache = $cache;
  }

  /**
   * Fetches weather data from the external API.
   */
  public function getWeatherData() {
    $config = $this->configFactory->get('weather_widget.settings');
    $location = $config->get('location');
    $apiKey = $config->get('api_key');
    $cacheId = 'weather_widget:' . md5($location);

    if ($cache = $this->cache->get($cacheId)) {
      return $cache->data;
    }

    try {
      $url = "https://api.weatherapi.com/v1/current.json?key=$apiKey&q=" . urlencode($location);
      $response = $this->httpClient->request('GET', $url);
      $data = json_decode($response->getBody(), TRUE);
      $this->cache->set($cacheId, $data, time() + 3600);
      return $data;
    }
    catch (\Exception $e) {
      return NULL;
    }
  }

}
