<?php

namespace App\Http\Controllers\External\Weather;

use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Http\Controllers\Controller;
use App\Http\Requests\Weather\GetWeatherRequest;
use App\Http\Resources\Weather\WeatherResource;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;

class GetWeatherController extends Controller
{
    private GetWeather $getWeatherService;

    /**
     * @param GetWeather $getWeatherService
     */
    public function __construct(GetWeather $getWeatherService)
    {
        $this->getWeatherService = $getWeatherService;
    }

    /**
     * @throws RequestException
     */
    public function __invoke(GetWeatherRequest $request): JsonResponse
    {
        $response = new WeatherResource(
            $this->getWeatherService->handle(
                $request->input('latitude'),
                $request->input('longitude'),
                $request->input('units')
            ));

        return response()->json($response);
    }
}
