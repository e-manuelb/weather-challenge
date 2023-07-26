<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\SyncWeathers;
use App\Data\Services\Weather\SyncWeathersService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class SyncWeathersTest extends TestCase
{
    private SyncWeathers $syncWeathersService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->syncWeathersService = app(SyncWeathers::class);
    }

    /**
     * @throws Exception
     */
    public function testSyncWeathers()
    {
        $users = User::factory(30)->create();

        $users->each(fn($user) => Weather::factory()->create(['user_id' => $user->id]));

        $this->syncWeathersService->handle();

        $this->expectNotToPerformAssertions();
    }
}
