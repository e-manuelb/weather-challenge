<?php

namespace App\Data\Services\Weather\Features;

use App\Domain\Models\Weather;

interface UpdateWeather
{
    /**
     * @param string $id
     * @param array $data
     * @return Weather
     */
    public function handle(string $id, array $data = []): Weather;
}
