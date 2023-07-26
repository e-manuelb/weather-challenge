<?php

namespace App\Data\Repositories\Weather;

use App\Data\Repositories\BaseRepository;
use App\Domain\Models\Weather;

class WeatherRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new Weather());
    }
}
