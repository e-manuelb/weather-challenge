<?php

namespace Http\Controllers\User;

use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class UpdateUserControllerTest extends TestCase
{
    use OpenWeatherMocks;

    public function testUpdateUserSuccessfully()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $payload = [
            'email' => 'test@test.com'
        ];

        $response = $this->putJson(route('user.update', $user->id), $payload);

        $response->assertSuccessful();
    }

    public function testUpdateUserNameTypeValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $user = User::factory()->create();

        $payload = [
            'name' => ['John Doe'],
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $response = $this->putJson(route('user.update', $user->id), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The name must be a string.'
        ]);
    }

    public function testUpdateUserEmailTypeValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $user = User::factory()->create();

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $response = $this->putJson(route('user.update', $user->id), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The email must be a valid email address.'
        ]);
    }

    public function testUpdateUserLatitudeTypeValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $user = User::factory()->create();

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => 'test',
            'longitude' => '12.34'
        ];

        $response = $this->putJson(route('user.update', $user->id), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The latitude format is invalid.'
        ]);
    }

    public function testUpdateUserLongitudeTypeValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $user = User::factory()->create();

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => 'test'
        ];

        $response = $this->putJson(route('user.update', $user->id), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The longitude format is invalid.'
        ]);
    }
}
