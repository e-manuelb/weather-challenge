<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\CreateWeather;
use App\Domain\Models\User;
use Exception;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class CreateWeatherTest extends TestCase
{
    use OpenWeatherMocks;
    private CreateWeather $createWeatherService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createWeatherService = app(CreateWeather::class);
    }

    /**
     * @throws Exception
     */
    public function testCreateWeather()
    {
        $user = User::factory()->create();

        $data = [
            'user_id' => $user->id,
            'description' => json_encode($this->getWeatherMock()),
            'synced_at' => now()
        ];

        $weather = $this->createWeatherService->handle($data);

        $this->assertEquals($weather->user_id, $data['user_id']);
        $this->assertEquals($weather->description, $this->getWeatherMock());
    }
}
