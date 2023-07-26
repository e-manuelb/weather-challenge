<?php

namespace Services\User\Features;

use App\Data\Services\User\Features\ListUsers;
use App\Domain\Models\User;
use Exception;
use Tests\TestCase;

class ListUsersTest extends TestCase
{
    private ListUsers $listUsersService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->listUsersService = app(ListUsers::class);
    }

    /**
     * @throws Exception
     */
    public function testListUsers()
    {
        User::factory(50)->create();

        $users = $this->listUsersService->handle();

        $this->assertCount(50, $users);
    }
}
