<?php

namespace App\Data\Services\Weather\Features;

use App\Domain\Models\Weather;

interface CreateWeather
{
    /**
     * @param array $data
     * @return \App\Domain\Models\Weather
     */
    public function handle(array $data): Weather;
}
