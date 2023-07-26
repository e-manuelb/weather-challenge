<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\SyncWeather;
use App\Data\Services\Weather\SyncWeathersService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class SyncWeathersServiceTest extends TestCase
{
    use OpenWeatherMocks;

    private WeatherRepository $weatherRepository;
    private SyncWeather $syncWeatherService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
        $this->syncWeatherService = app(SyncWeather::class);
    }

    public function testSyncWeathersService()
    {
        $service = new SyncWeathersService($this->weatherRepository, $this->syncWeatherService);

        $users = User::factory(30)->create();

        $users->each(fn($user) => Weather::factory()->create(['user_id' => $user->id]));

        $service->handle();

        $this->expectNotToPerformAssertions();
    }
}
