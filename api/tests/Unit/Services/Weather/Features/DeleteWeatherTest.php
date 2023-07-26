<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\DeleteWeatherService;
use App\Data\Services\Weather\Features\DeleteWeather;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class DeleteWeatherTest extends TestCase
{
    private DeleteWeather $deleteWeatherService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->deleteWeatherService = app(DeleteWeather::class);
    }

    /**
     * @throws Exception
     */
    public function testDeleteWeather()
    {
        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $this->deleteWeatherService->handle($weather->id);

        $this->assertDatabaseEmpty('weathers');
    }
}
