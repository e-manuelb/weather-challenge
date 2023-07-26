<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\UpdateWeather;
use App\Domain\Models\Weather;

class UpdateWeatherService implements UpdateWeather
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
     * @param array $data
     * @return Weather
     */
    public function handle(string $id, array $data = []): Weather
    {
        /** @var Weather $weather */
        $weather = $this->weatherRepository->findOrFail($id);

        $weather->update($data);

        return $weather;
    }
}
