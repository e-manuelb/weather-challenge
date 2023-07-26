<?php

namespace App\Providers;

use App\Data\Services\External\OpenWeather\Features\GetWeather as ExternalGetWeather;
use App\Data\Services\External\OpenWeather\GetWeatherService as ExternalGetWeatherService;
use App\Data\Services\User\CreateUserService;
use App\Data\Services\User\DeleteUserService;
use App\Data\Services\User\Features\CreateUser;
use App\Data\Services\User\Features\DeleteUser;
use App\Data\Services\User\Features\GetUser;
use App\Data\Services\User\Features\ListUsers;
use App\Data\Services\User\Features\PaginateUsers;
use App\Data\Services\User\Features\UpdateUser;
use App\Data\Services\User\GetUserService;
use App\Data\Services\User\ListUsersService;
use App\Data\Services\User\PaginateUsersService;
use App\Data\Services\User\UpdateUserService;
use App\Data\Services\Weather\CreateWeatherService;
use App\Data\Services\Weather\DeleteWeatherService;
use App\Data\Services\Weather\Features\CreateWeather;
use App\Data\Services\Weather\Features\DeleteWeather;
use App\Data\Services\Weather\Features\GetWeather;
use App\Data\Services\Weather\Features\GetWeatherByUserId;
use App\Data\Services\Weather\Features\ListWeathers;
use App\Data\Services\Weather\Features\SyncWeather;
use App\Data\Services\Weather\Features\SyncWeathers;
use App\Data\Services\Weather\Features\UpdateWeather;
use App\Data\Services\Weather\GetWeatherByUserIdService;
use App\Data\Services\Weather\GetWeatherService;
use App\Data\Services\Weather\ListWeathersService;
use App\Data\Services\Weather\SyncWeatherService;
use App\Data\Services\Weather\SyncWeathersService;
use App\Data\Services\Weather\UpdateWeatherService;
use Illuminate\Support\ServiceProvider;

class FeatureServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Open Weather
        $this->app->bind(ExternalGetWeather::class, ExternalGetWeatherService::class);

        // User
        $this->app->bind(CreateUser::class, CreateUserService::class);
        $this->app->bind(ListUsers::class, ListUsersService::class);
        $this->app->bind(GetUser::class, GetUserService::class);
        $this->app->bind(UpdateUser::class, UpdateUserService::class);
        $this->app->bind(DeleteUser::class, DeleteUserService::class);

        // Weather
        $this->app->bind(CreateWeather::class, CreateWeatherService::class);
        $this->app->bind(ListWeathers::class, ListWeathersService::class);
        $this->app->bind(PaginateUsers::class, PaginateUsersService::class);
        $this->app->bind(GetWeather::class, GetWeatherService::class);
        $this->app->bind(GetWeatherByUserId::class, GetWeatherByUserIdService::class);
        $this->app->bind(UpdateWeather::class, UpdateWeatherService::class);
        $this->app->bind(DeleteWeather::class, DeleteWeatherService::class);
        $this->app->bind(SyncWeather::class, SyncWeatherService::class);
        $this->app->bind(SyncWeathers::class, SyncWeathersService::class);
    }
}
