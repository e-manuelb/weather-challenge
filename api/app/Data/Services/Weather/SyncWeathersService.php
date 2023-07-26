<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\Weather\Features\SyncWeather;
use App\Data\Services\Weather\Features\SyncWeathers;

class SyncWeathersService implements SyncWeathers
{
    private WeatherRepository $weatherRepository;
    private SyncWeather $syncWeatherService;

    /**
     * @param WeatherRepository $weatherRepository
     * @param SyncWeather $syncWeatherService
     */
    public function __construct(WeatherRepository $weatherRepository, SyncWeather $syncWeatherService)
    {
        $this->weatherRepository = $weatherRepository;
        $this->syncWeatherService = $syncWeatherService;
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->weatherRepository
            ->query()
            ->where('synced_at', '<=', now()->addHours(config('app.min_time_to_sync_in_hours')))
            ->each(fn($weather) => $this->syncWeatherService->handle($weather->id));
    }
}
