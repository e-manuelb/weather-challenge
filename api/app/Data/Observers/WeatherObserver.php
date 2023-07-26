<?php

namespace App\Data\Observers;

use App\Domain\Models\Weather;
use Ramsey\Uuid\Uuid;

class WeatherObserver
{
    /**
     * @param Weather $weather
     * @return void
     */
    public function creating(Weather $weather): void
    {
        $weather->id = Uuid::uuid7();
    }
}
