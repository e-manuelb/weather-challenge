<?php

namespace App\Data\Services\Weather\Features;

use App\Domain\Models\Weather;

interface GetWeather
{
    /**
     * @param string $id
     * @return \App\Domain\Models\Weather
     */
    public function handle(string $id): Weather;
}
