<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\UpdateWeather;
use App\Data\Services\Weather\UpdateWeatherService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class UpdateWeatherTest extends TestCase
{
    private UpdateWeather $updateWeatherService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->updateWeatherService = app(UpdateWeather::class);
    }

    /**
     * @throws Exception
     */
    public function testUpdateWeather()
    {
        $now = now();

        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $payload = [
            'synced_at' => $now
        ];

        $this->updateWeatherService->handle($weather->id, $payload);

        $this->assertEquals($weather->refresh()->synced_at, $payload['synced_at']);
    }
}
