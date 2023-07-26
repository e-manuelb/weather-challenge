<?php

namespace Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\DeleteUserService;
use App\Domain\Models\User;
use Tests\TestCase;

class DeleteUserServiceTest extends TestCase
{
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(UserRepository::class);
    }

    public function testDeleteUserService()
    {
        $service = new DeleteUserService($this->userRepository);

        $user = User::factory()->create();

        $service->handle($user->id);

        $this->assertDatabaseEmpty('users');
    }
}
