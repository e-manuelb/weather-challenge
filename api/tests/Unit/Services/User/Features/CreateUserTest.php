<?php

namespace Services\User\Features;

use App\Data\Services\User\Features\CreateUser;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use OpenWeatherMocks;

    private CreateUser $createUserService;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUserService = app(CreateUser::class);
    }

    /**
     * @throws RequestException
     */
    public function testCreateUser()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $user = $this->createUserService->handle($payload);

        $this->assertEquals($user->name, $payload['name']);
        $this->assertEquals($user->email, $payload['email']);
        $this->assertEquals($user->latitude, $payload['latitude']);
        $this->assertEquals($user->longitude, $payload['longitude']);
    }
}
