<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\GetWeather;
use App\Domain\Models\Weather;

class GetWeatherService implements GetWeather
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
     * @return \App\Domain\Models\Weather
     */
    public function handle(string $id): Weather
    {
        /** @var \App\Domain\Models\Weather $weather */
        $weather = $this->weatherRepository->findOrFail($id);

        return $weather;
    }
}
