<?php

namespace Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\GetUserService;
use App\Domain\Models\User;
use Tests\TestCase;

class GetUserServiceTest extends TestCase
{
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(UserRepository::class);
    }

    public function testGetUserService()
    {
        $service = new GetUserService($this->userRepository);

        $user = User::factory()->create();

        $user = $service->handle($user->id);

        $this->assertNotEmpty($user);
    }
}
