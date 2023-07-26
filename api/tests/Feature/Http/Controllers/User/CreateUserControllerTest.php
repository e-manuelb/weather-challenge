<?php

namespace Http\Controllers\User;

use App\Domain\Models\User;
use Illuminate\Support\Facades\Http;
use Tests\Helpers\OpenWeatherMocks;
use Tests\TestCase;

class CreateUserControllerTest extends TestCase
{
    use OpenWeatherMocks;

    public function testCreateUserSuccessfully()
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

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertSuccessful();
        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'latitude',
            'longitude',
            'weather',
            '_links'
        ]);
    }

    public function testCreateUserNameRequiredValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The name field is required.'
        ]);
    }

    public function testCreateUserNameStringValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => ['John Doe'],
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The name must be a string.'
        ]);
    }

    public function testCreateUserEmailRequiredValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The email field is required.'
        ]);
    }

    public function testCreateUserEmailTypeEmailValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => ['john.doe@test.com'],
            'latitude' => '11.33',
            'longitude' => '12.34'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The email must be a valid email address.'
        ]);
    }

    public function testCreateUserEmailUniqueValidationError()
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

        User::factory()->create([
            'email' => $payload['email']
        ]);

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The email has already been taken.'
        ]);
    }

    public function testCreateUserLatitudeRequiredValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'longitude' => '12.34'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The latitude field is required.'
        ]);
    }

    public function testCreateUserLatitudeRegexValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => 'test',
            'longitude' => '12.34'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The latitude format is invalid.'
        ]);
    }

    public function testCreateUserLongitudeRequiredValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The longitude field is required.'
        ]);
    }

    public function testCreateUserLongitudeRegexValidationError()
    {
        Http::fake([
            '*openweather*' => Http::response($this->getWeatherMock())
        ]);

        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'latitude' => '11.33',
            'longitude' => 'test'
        ];

        $response = $this->postJson(route('user.create'), $payload);

        $response->assertUnprocessable();
        $response->assertJson([
            'message' => 'The longitude format is invalid.'
        ]);
    }
}
