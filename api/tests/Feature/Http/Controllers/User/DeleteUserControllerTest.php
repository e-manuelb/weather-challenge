<?php

namespace Http\Controllers\User;

use App\Domain\Models\User;
use Tests\TestCase;

class DeleteUserControllerTest extends TestCase
{
    public function testDeleteUserSuccessfully()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson(route('user.delete', $user->id));

        $response->assertSuccessful();
        $response->assertJson([
            'message' => "User with ID #$user->id was deleted successfully."
        ]);

        $this->assertDatabaseEmpty('users');
    }
}
