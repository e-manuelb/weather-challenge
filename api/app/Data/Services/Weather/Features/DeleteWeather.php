<?php

namespace App\Data\Services\Weather\Features;

interface DeleteWeather
{
    /**
     * @param string $id
     * @return void
     */
    public function handle(string $id): void;
}
