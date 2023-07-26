<?php

namespace Services\External;

use App\Data\Services\External\OpenWeather\GetWeatherService;
use Exception;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class GetWeatherServiceTest extends TestCase
{
    use OpenWeatherMocks;

    /**
     * @throws Exception
     */
    public function testGetWeatherService()
    {
        $service = (new GetWeatherService());

        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $this->assertEquals($service->handle(11.34, 11.32), $this->getWeatherMock());
    }
}
