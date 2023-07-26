<?php

namespace Http\Controllers\User;

use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\TestCase;

class ListUsersControllerTest extends TestCase
{
    public function testListUsersSuccessfully()
    {
        $users = User::factory(35)->create();

        $users->each(fn($user) => Weather::factory()->create(['user_id' => $user->id]));

        $response = $this->getJson(route('user.list'));

        $response->assertSuccessful();
    }
}
