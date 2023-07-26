<?php

namespace Database\Factories\Domain\Models;

use App\Domain\Models\User;
use App\Domain\Models\Weather;
use Illuminate\Database\Eloquent\Factories\Factory;
use ReflectionException;
use Tests\Helpers\OpenWeatherMocks;

/**
 * @extends Factory<Weather>
 */
class WeatherFactory extends Factory
{
    use OpenWeatherMocks;

    protected $model = Weather::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => '0',
            'description' => json_encode($this->getWeatherMock()),
            'synced_at' => now()
        ];
    }
}
