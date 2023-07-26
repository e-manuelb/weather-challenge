<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\DeleteWeather;

class DeleteWeatherService implements DeleteWeather
{
    private WeatherRepository $weatherRepository;

    /**
     * @param WeatherRepository $weatherRepository
     */
    public function __construct(WeatherRepository $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @param string $id
     * @return void
     */
    public function handle(string $id): void
    {
        $this->weatherRepository->deleteById($id);
    }
}
