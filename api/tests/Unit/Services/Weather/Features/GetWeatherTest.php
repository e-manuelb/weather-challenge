<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\GetWeather;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class GetWeatherTest extends TestCase
{
    private GetWeather $getWeatherService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->getWeatherService = app(GetWeather::class);
    }

    /**
     * @throws Exception
     */
    public function testGetWeather()
    {
        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $data = $this->getWeatherService->handle($weather->id);

        $this->assertNotNull($data);
    }
}
