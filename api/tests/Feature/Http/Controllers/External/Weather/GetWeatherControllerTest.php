<?php

namespace Http\Controllers\External\Weather;

use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class GetWeatherControllerTest extends TestCase
{
    use OpenWeatherMocks;

    public function testGetWeatherSuccessfully()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $route = route('external.get.weather');
        $query = http_build_query([
            'longitude' => '10.99',
            'latitude' => '44.34'
        ]);

        $response = $this->getJson("$route?$query");

        $response->assertSuccessful();
    }

    public function testGetWeatherLongitudeRequiredValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $route = route('external.get.weather');
        $query = http_build_query([
            'latitude' => '44.34'
        ]);

        $response = $this->getJson("$route?$query");

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The longitude field is required.'
        ]);
    }

    public function testGetWeatherLongitudeRegexValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $route = route('external.get.weather');
        $query = http_build_query([
            'longitude' => 'test',
            'latitude' => '44.34'
        ]);

        $response = $this->getJson("$route?$query");

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The longitude format is invalid.'
        ]);
    }

    public function testGetWeatherLatitudeRequiredValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $route = route('external.get.weather');
        $query = http_build_query([
            'longitude' => '10.99',
        ]);

        $response = $this->getJson("$route?$query");

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The latitude field is required.'
        ]);
    }

    public function testGetWeatherLatitudeRegexValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $route = route('external.get.weather');
        $query = http_build_query([
            'longitude' => '10.99',
            'latitude' => 'test'
        ]);

        $response = $this->getJson("$route?$query");

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The latitude format is invalid.'
        ]);
    }

    public function testGetWeatherUnitsRuleInValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $route = route('external.get.weather');
        $query = http_build_query([
            'longitude' => '10.99',
            'latitude' => '44.34',
            'units' => 'aaaa'
        ]);

        $response = $this->getJson("$route?$query");

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The selected units is invalid.'
        ]);
    }
}
