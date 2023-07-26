<?php

namespace Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\ListWeathersService;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Tests\TestCase;

class ListWeathersServiceTest extends TestCase
{
    private WeatherRepository $weatherRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->weatherRepository = app(WeatherRepository::class);
    }

    public function testListWeathers()
    {
        $service = new ListWeathersService($this->weatherRepository);

        $users = User::factory(30)->create();

        $users->each(fn($user) => Weather::factory()->create(['user_id' => $user->id]));

        $weathers = $service->handle();

        $this->assertCount(30, $weathers);
    }
}
