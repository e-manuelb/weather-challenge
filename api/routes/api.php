<?php

use App\Http\Controllers\External\Weather\GetWeatherController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\GetUserController;
use App\Http\Controllers\User\ListUsersController;
use App\Http\Controllers\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'message' => 'all systems are a go',
        'users' => \App\Domain\Models\User::all(),
    ]);
});

Route::prefix('weather')->group(function () {
    Route::get('/', GetWeatherController::class)->name('external.get.weather');
});

Route::prefix('user')->group(function () {
    Route::post('/', CreateUserController::class)->name('user.create');
    Route::get('/', ListUsersController::class)->name('user.list');
    Route::get('/{id}', GetUserController::class)->name('user.get');
    Route::put('/{id}', UpdateUserController::class)->name('user.update');
    Route::delete('/{id}', DeleteUserController::class)->name('user.delete');
});
