<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Data\Services\User\Features\GetUser;
use App\Data\Services\Weather\SyncWeatherService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class SyncWeatherServiceTest extends TestCase
{
    use OpenWeatherMocks;

    private WeatherRepository $weatherRepository;
    private GetWeather $getWeatherService;
    private GetUser $getUserService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
        $this->getWeatherService = app(GetWeather::class);
        $this->getUserService = app(GetUser::class);
    }

    /**
     * @throws RequestException
     */
    public function testSyncWeatherService()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $service = new SyncWeatherService($this->weatherRepository, $this->getWeatherService, $this->getUserService);

        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $service->handle($weather->id);

        $this->expectNotToPerformAssertions();
    }
}
