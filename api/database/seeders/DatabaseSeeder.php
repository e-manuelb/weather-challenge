<?php

namespace Database\Seeders;

use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Domain\Constants\UnitTypes;
use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Database\Seeder;
use Illuminate\Http\Client\RequestException;

class DatabaseSeeder extends Seeder
{
    private GetWeather $getWeatherService;

    /**
     * @param GetWeather $getWeatherService
     */
    public function __construct(GetWeather $getWeatherService)
    {
        $this->getWeatherService = $getWeatherService;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     * @throws RequestException
     */
    public function run(): void
    {
        $users = User::factory(60)->create();

        $users->each(function ($user) {
            $weather = $this->getWeatherService->handle($user->latitude, $user->longitude, UnitTypes::METRIC);

            Weather::factory()->make([
                'user_id' => $user->id,
                'description' => json_encode($weather)
            ])->save();
        });
    }
}
