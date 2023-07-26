<?php

namespace Services\User\Features;

use App\Data\Services\User\Features\UpdateUser;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    private UpdateUser $updateUserService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->updateUserService = app(UpdateUser::class);
    }

    /**
     * @throws Exception
     */
    public function testUpdateUser()
    {
        $user = User::factory()->create();

        Weather::factory()->create([
            'user_id' => $user->id
        ]);

        $payload = [
            'email' => 'test@test.com'
        ];

        $this->updateUserService->handle($user->id, $payload);

        $this->assertEquals($user->refresh()->email, $payload['email']);
    }
}
