<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\CreateWeather;
use App\Domain\Models\Weather;

class CreateWeatherService implements CreateWeather
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
     * @param array $data
     * @return Weather
     */
    public function handle(array $data): Weather
    {
        /** @var Weather $weather */
        $weather = $this->weatherRepository->create($data);

        return $weather;
    }
}
