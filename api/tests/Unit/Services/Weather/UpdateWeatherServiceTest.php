<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\UpdateWeatherService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\TestCase;

class UpdateWeatherServiceTest extends TestCase
{
    private WeatherRepository $weatherRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
    }

    public function testUpdateWeatherService()
    {
        $service = new UpdateWeatherService($this->weatherRepository);

        $now = now();

        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $payload = [
            'synced_at' => $now
        ];

        $service->handle($weather->id, $payload);

        $this->assertEquals($weather->refresh()->synced_at, $payload['synced_at']);
    }
}
