<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\DeleteWeatherService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\TestCase;

class DeleteWeatherServiceTest extends TestCase
{
    private WeatherRepository $weatherRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
    }

    public function testDeleteWeatherService()
    {
        $service = new DeleteWeatherService($this->weatherRepository);

        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $service->handle($weather->id);

        $this->assertDatabaseEmpty('weathers');
    }
}
