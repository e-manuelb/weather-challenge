<?php

namespace App\Data\Services\External\OpenWeather;

use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Domain\Constants\UnitTypes;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GetWeatherService extends BaseService implements GetWeather
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param string|null $units
     * @return array
     * @throws RequestException
     */
    public function handle(float $latitude, float $longitude, ?string $units = UnitTypes::METRIC): array
    {
        $cacheKey = "weather-for-lat-$latitude-and-lon-$longitude-with-units-$units";

        $queryString = http_build_query([
            'lat' => $latitude,
            'lon' => $longitude,
            'units' => $units
        ]);

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        };

        $response = $this->get("/data/2.5/weather?$queryString");

        $response->throw(function (Response $response) {
            $message = "Request failed with error: {$response->json()}.";

            Log::error($message);

            return [];
        });

        Cache::put($cacheKey, $response->json(), 3600);

        return $response->json();
    }
}
