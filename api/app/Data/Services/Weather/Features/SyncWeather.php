<?php

namespace App\Data\Services\Weather\Features;

use Illuminate\Http\Client\RequestException;

interface SyncWeather
{
    /**
     * @param string $id
     * @return void
     * @throws RequestException
     */
    public function handle(string $id): void;
}
