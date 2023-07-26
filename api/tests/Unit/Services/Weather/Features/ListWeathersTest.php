<?php

namespace Services\Weather\Features;

use App\Data\Services\Weather\Features\ListWeathers;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Exception;
use Tests\TestCase;

class ListWeathersTest extends TestCase
{
    private ListWeathers $listWeathersService;
    protected function setUp(): void
    {
        parent::setUp();

        $this->listWeathersService = app(ListWeathers::class);
    }

    /**
     * @throws Exception
     */
    public function testListWeathers()
    {
        $users = User::factory(30)->create();

        $users->each(fn($user) => Weather::factory()->create(['user_id' => $user->id]));

        $weathers = $this->listWeathersService->handle();

        $this->assertCount(30, $weathers);
    }
}
