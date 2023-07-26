<?php

namespace Services\User\Features;

use App\Data\Services\User\Features\DeleteUser;
use App\Domain\Models\User;
use Exception;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    private DeleteUser $deleteUserService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->deleteUserService = app(DeleteUser::class);
    }

    /**
     * @throws Exception
     */
    public function testDeleteUser()
    {
        $user = User::factory()->create();

        $this->deleteUserService->handle($user->id);

        $this->assertDatabaseEmpty('users');
    }
}
