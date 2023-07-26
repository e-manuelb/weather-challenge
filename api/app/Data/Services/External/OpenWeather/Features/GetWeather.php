<?php

namespace App\Data\Services\External\OpenWeather\Features;

use App\Domain\Constants\UnitTypes;
use Illuminate\Http\Client\RequestException;

interface GetWeather
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param string|null $units
     * @return array
     * @throws RequestException
     */
    public function handle(float $latitude, float $longitude, ?string $units = UnitTypes::METRIC): array;
}
