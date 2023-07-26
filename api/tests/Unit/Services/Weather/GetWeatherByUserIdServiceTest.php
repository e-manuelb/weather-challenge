<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\GetWeatherByUserIdService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\TestCase;

class GetWeatherByUserIdServiceTest extends TestCase
{
    private WeatherRepository $weatherRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
    }

    public function testGetWeatherByUserIdService()
    {
        $service = new GetWeatherByUserIdService($this->weatherRepository);

        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $weather = $service->handle($user->id);

        $this->assertNotEmpty($weather);
    }
}
