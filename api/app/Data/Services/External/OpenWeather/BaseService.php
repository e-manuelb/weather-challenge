<?php

namespace App\Data\Services\External\OpenWeather;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class BaseService
{
    private string $baseURL;
    private string $apiKey;

    public function __construct()
    {
        $this->baseURL = config('app.open_weather_api_url');
        $this->apiKey = config('app.open_weather_api_key');
    }

    public function get(string $url): Response
    {
        return Http::withoutVerifying()->get($this->baseURL . $url . "&APPID=$this->apiKey");
    }
}
