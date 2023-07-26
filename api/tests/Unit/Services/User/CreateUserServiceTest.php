<?php

namespace Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Data\Services\User\CreateUserService;
use App\Data\Services\Weather\Features\CreateWeather;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class CreateUserServiceTest extends TestCase
{
    use OpenWeatherMocks;

    private UserRepository $userRepository;
    private GetWeather $getWeatherService;
    private CreateWeather $createWeatherService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(UserRepository::class);
        $this->getWeatherService = app(GetWeather::class);
        $this->createWeatherService = app(CreateWeather::class);
    }

    /**
     * @throws RequestException
     */
    public function testCreateUserService()
    {
        $service = new CreateUserService($this->userRepository, $this->getWeatherService, $this->createWeatherService);

        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $user = $service->handle($payload);

        $this->assertEquals($user->name, $payload['name']);
        $this->assertEquals($user->email, $payload['email']);
        $this->assertEquals($user->latitude, $payload['latitude']);
        $this->assertEquals($user->longitude, $payload['longitude']);
    }
}
