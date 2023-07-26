<?php

namespace App\Data\Services\Weather\Features;

use App\Domain\Models\Weather;

interface GetWeatherByUserId
{
    /**
     * @param string $userId
     * @return Weather
     */
    public function handle(string $userId): Weather;
}
