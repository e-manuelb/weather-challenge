<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\CreateWeatherService;
use App\Domain\Models\User;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class CreateWeatherServiceTest extends TestCase
{
    use OpenWeatherMocks;

    private WeatherRepository $weatherRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
    }

    public function testCreateWeatherService()
    {
        $service = new CreateWeatherService($this->weatherRepository);

        $user = User::factory()->create();

        $data = [
            'user_id' => $user->id,
            'description' => json_encode($this->getWeatherMock()),
            'synced_at' => now()
        ];

        $weather = $service->handle($data);

        $this->assertEquals($weather->user_id, $data['user_id']);
        $this->assertEquals($weather->description, $this->getWeatherMock());
    }
}
