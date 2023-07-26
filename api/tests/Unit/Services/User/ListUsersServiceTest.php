<?php

namespace Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\ListUsersService;
use App\Domain\Models\User;
use Tests\TestCase;

class ListUsersServiceTest extends TestCase
{
    private UserRepository $userRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(UserRepository::class);
    }

    public function testListUsersService()
    {
        $service = new ListUsersService($this->userRepository);

        User::factory(50)->create();

        $users = $service->handle();

        $this->assertCount(50, $users);
    }
}
