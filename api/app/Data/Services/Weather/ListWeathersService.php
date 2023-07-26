<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\ListWeathers;
use Illuminate\Database\Eloquent\Collection;

class ListWeathersService implements ListWeathers
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
     * @return array|Collection
     */
    public function handle(): Collection|array
    {
        return $this->weatherRepository->get();
    }
}
