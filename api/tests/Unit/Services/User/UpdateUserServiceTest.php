<?php

namespace Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Data\Services\User\UpdateUserService;
use App\Data\Services\Weather\Features\GetWeatherByUserId;
use App\Data\Services\Weather\Features\UpdateWeather;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Http\Client\RequestException;
use Tests\TestCase;

class UpdateUserServiceTest extends TestCase
{
    private UserRepository $userRepository;
    private GetWeather $getWeatherService;
    private GetWeatherByUserId $getWeatherByUserIdService;
    private UpdateWeather $updateWeatherService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(UserRepository::class);
        $this->getWeatherService = app(GetWeather::class);
        $this->getWeatherByUserIdService = app(GetWeatherByUserId::class);
        $this->updateWeatherService = app(UpdateWeather::class);
    }

    /**
     * @throws RequestException
     */
    public function testUpdateUserService()
    {
        $service = new UpdateUserService($this->userRepository, $this->getWeatherService, $this->getWeatherByUserIdService, $this->updateWeatherService);
        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $payload = [
            'email' => 'test@test.com'
        ];

        $service->handle($user->id, $payload);

        $this->assertEquals($user->refresh()->email, $payload['email']);
    }
}
