<?php

namespace Services\External\Features;

use App\Data\Services\External\OpenWeather\Features\GetWeather;
use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class GetWeatherTest extends TestCase
{
    use OpenWeatherMocks;

    private GetWeather $getWeatherService;

    public function setUp(): void
    {
        parent::setUp();

        $this->getWeatherService = app(GetWeather::class);
    }

    /**
     * @throws Exception|RequestException
     */
    public function testGetWeather(): void
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $this->assertEquals($this->getWeatherService->handle(11.34, 11.32), $this->getWeatherMock());
    }
}
