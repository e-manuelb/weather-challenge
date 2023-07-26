<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\GetWeatherService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\TestCase;

class GetWeatherServiceTest extends TestCase
{
    private WeatherRepository $weatherRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
    }

    public function testGetWeatherService()
    {
        $service = new GetWeatherService($this->weatherRepository);

        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $data = $service->handle($weather->id);

        $this->assertNotNull($data);
    }
}
