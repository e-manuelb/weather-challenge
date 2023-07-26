<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\SyncWeather;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class SyncWeatherTest extends TestCase
{
    use OpenWeatherMocks;

    private SyncWeather $syncWeatherService;
    protected function setUp(): void
    {
        parent::setUp();

        $this->syncWeatherService = app(SyncWeather::class);
    }

    /**
     * @throws RequestException
     */
    public function testSyncWeather()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $weather = Weather::factory()->create([
            'user_id' => User::factory()->create()->id
        ]);

        $this->syncWeatherService->handle($weather->id);

        $this->expectNotToPerformAssertions();
    }
}
