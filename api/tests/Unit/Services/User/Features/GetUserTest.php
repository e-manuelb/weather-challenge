<?php

namespace Services\User\Features;

use App\Data\Services\User\Features\GetUser;
use App\Domain\Models\User;
use Exception;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    private GetUser $getUserService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->getUserService = app(GetUser::class);
    }

    /**
     * @throws Exception
     */
    public function testGetUser()
    {
        $user = User::factory()->create();

        $user = $this->getUserService->handle($user->id);

        $this->assertNotEmpty($user);
    }
}
