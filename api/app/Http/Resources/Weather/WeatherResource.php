<?php

namespace App\Http\Resources\Weather;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = $this->resource;

        return [
            'coordinate' => [
                'longitude' => $data['coord']['lon'],
                'latitude' => $data['coord']['lat']
            ],
            'weather' => $data['weather'],
            'base' => $data['base'],
            'main' => [
                'temperature' => $data['main']['temp'],
                'feels_like' => $data['main']['feels_like'],
                'min_temperature' => $data['main']['temp_min'],
                'max_temperature' => $data['main']['temp_max'],
                'pressure' => $data['main']['pressure'],
                'humidity' => $data['main']['humidity'],
                'sea_level' => $data['main']['sea_level'],
                'ground_level' => $data['main']['grnd_level'],
            ],
            'visibility' => $data['visibility'],
            'wind' => [
                'speed' => $data['wind']['speed'],
                'degrees' => $data['wind']['deg'],
                'gust' => $data['wind']['gust']
            ],
            'clouds' => [
                'all' => $data['clouds']['all']
            ],
            'rain' => array_key_exists('rain', $data) ? $data['rain'] : [],
            'now' => array_key_exists('snow', $data) ? $data['snow'] : [],
            'data_calculation_time' => Carbon::createFromTimestamp($data['dt']),
            'sys' => [
                'id' => array_key_exists('id', $data['sys']) ? $data['sys']['id'] : null,
                'type' => array_key_exists('type', $data['sys']) ? $data['sys']['type'] : null,
                'country' => $data['sys']['country'],
                'sunrise' => Carbon::createFromTimestamp($data['sys']['sunrise']),
                'sunset' => Carbon::createFromTimestamp($data['sys']['sunset']),
            ],
            'timezone' => $data['timezone'],
            'code' => $data['cod']
        ];
    }
}
