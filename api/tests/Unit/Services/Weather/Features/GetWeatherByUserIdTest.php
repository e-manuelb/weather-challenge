<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\GetWeatherByUserId;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class GetWeatherByUserIdTest extends TestCase
{
    private GetWeatherByUserId $getWeatherByUserIdService;
    protected function setUp(): void
    {
        parent::setUp();

        $this->getWeatherByUserIdService = app(GetWeatherByUserId::class);
    }

    /**
     * @throws Exception
     */
    public function testGetWeatherByUserId()
    {
        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $weather = $this->getWeatherByUserIdService->handle($user->id);

        $this->assertNotEmpty($weather);
    }
}
