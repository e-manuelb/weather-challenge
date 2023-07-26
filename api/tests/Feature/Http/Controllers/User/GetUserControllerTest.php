<?php

namespace Http\Controllers\User;

use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Support\Str;
use Tests\TestCase;

class GetUserControllerTest extends TestCase
{
    public function testGetUserSuccessfully()
    {
        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->getJson(route('user.get', $user->id));

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

    public function testGetUserError()
    {
        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $fakeId = Str::uuid();

        $response = $this->getJson(route('user.get', $fakeId));

        $response->assertBadRequest();
        $response->assertJson([
            'message' => "Cannot get user with ID #$fakeId due the error: No query results for model [App\Domain\Models\User] $fakeId."
        ]);
    }
}
