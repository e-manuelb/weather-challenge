<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\GetWeatherByUserId;
use App\Domain\Models\Weather;

class GetWeatherByUserIdService implements GetWeatherByUserId
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
     * @param string $userId
     * @return Weather
     */
    public function handle(string $userId): Weather
    {
        /** @var Weather $weather */
        $weather = $this->weatherRepository->query()->where('user_id', $userId)->firstOrFail();

        return $weather;
    }
}
