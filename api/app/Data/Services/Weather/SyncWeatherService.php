<?php

namespace App\Data\Services\Weather;

use App\Data\Repositories\Weather\WeatherRepository;
use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Data\Services\User\Features\GetUser;
use App\Data\Services\Weather\Features\SyncWeather;
use App\Domain\Models\Weather;
use Illuminate\Http\Client\RequestException;

class SyncWeatherService implements SyncWeather
{
    private WeatherRepository $weatherRepository;
    private GetWeather $getWeatherService;
    private GetUser $getUserService;

    /**
     * @param WeatherRepository $weatherRepository
     * @param GetWeather $getWeatherService
     * @param GetUser $getUserService
     */
    public function __construct(WeatherRepository $weatherRepository, GetWeather $getWeatherService, GetUser $getUserService)
    {
        $this->weatherRepository = $weatherRepository;
        $this->getWeatherService = $getWeatherService;
        $this->getUserService = $getUserService;
    }

    /**
     * @param string $id
     * @return void
     * @throws RequestException
     */
    public function handle(string $id): void
    {
        /** @var Weather $weather */
        $weather = $this->weatherRepository->findOrFail($id);

        $user = $this->getUserService->handle($weather->user_id);
        $description = $weather->description;

        $latitude = $description ? $description['coord']['lat'] : $user->latitude;
        $longitude = $description ? $description['coord']['lon'] : $user->longitude;

        $data = $this->getWeatherService->handle($latitude, $longitude);

        $weather->update([
            'description' => json_encode($data),
            'synced_at' => now()
        ]);
    }
}
