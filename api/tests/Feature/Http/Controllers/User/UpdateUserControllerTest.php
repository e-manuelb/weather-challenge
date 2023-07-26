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
}
