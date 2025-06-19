# Section 4 Module Development
## Activity 4.3
### API Integration Module

Files created
### 1. Module Declaration

- `weather_widget.info.yml`: Defines module metadata.

### 2. Configuration Form

- `src/Form/WeatherSettingsForm.php`: Provides admin form to enter API key and location.
- `weather_widget.routing.yml`: Registers route for the config form.
- `config/schema/weather_widget.schema.yml`: Defines config schema.

### 3. Weather Service

- `src/Service/WeatherService.php`:
  - Handles API communication using Guzzle: a PHP HTTP client library that makes it easy to send HTTP requests and integrate with web services.
  - Uses Drupal's config and caching systems.

### 4. Block Plugin

- `src/Plugin/Block/WeatherBlock.php`:
  - Injects the weather service.
  - Renders weather data using a theme hook.
  - Includes caching for performance.

### 5. Theming

- `weather_widget.module`: Registers the `weather_widget` theme hook.
- `templates/weather-widget.html.twig`: Twig template to display weather.
- `css/weather.css`: Styling for weather output.
- `weather_widget.libraries.yml`: Declares the CSS library.

 Navigate to **Configuration → Weather Widget Settings** and enter:

   * Weather API key (e.g., from [weatherapi.com](https://www.weatherapi.com))
   * Default city (e.g., Pune)

Directory Structure

```
weather_widget/
├── css/
│   └── weather.css
├── templates/
│   └── weather-widget.html.twig
├── src/
│   ├── Form/
│   │   └── WeatherSettingsForm.php
│   ├── Plugin/
│   │   └── Block/
│   │       └── WeatherBlock.php
│   └── Service/
│       └── WeatherService.php
├── config/
│   └── schema/
│       └── weather_widget.schema.yml
├── weather_widget.info.yml
├── weather_widget.libraries.yml
├── weather_widget.module
└── weather_widget.routing.yml

```
