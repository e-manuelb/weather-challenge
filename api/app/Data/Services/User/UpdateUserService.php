<?php

namespace App\Data\Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Data\Services\User\Features\UpdateUser;
use App\Data\Services\Weather\Features\GetWeatherByUserId;
use App\Data\Services\Weather\Features\UpdateWeather;
use App\Data\Services\Weather\UpdateWeatherService;
use App\Domain\Models\User;
use Illuminate\Http\Client\RequestException;

class UpdateUserService implements UpdateUser
{
    /*
     * Repository instance
     */
    private UserRepository $userRepository;

    /*
     * Services instances
     */
    private GetWeather $getWeatherService;
    private GetWeatherByUserId $getWeatherByUserId;
    private UpdateWeather $updateWeatherService;

    /**
     * @param UserRepository $userRepository
     * @param GetWeather $getWeatherService
     * @param GetWeatherByUserId $getWeatherByUserId
     * @param UpdateWeather $updateWeatherService
     */
    public function __construct(UserRepository $userRepository, GetWeather $getWeatherService, GetWeatherByUserId $getWeatherByUserId, UpdateWeather $updateWeatherService)
    {
        $this->userRepository = $userRepository;
        $this->getWeatherService = $getWeatherService;
        $this->getWeatherByUserId = $getWeatherByUserId;
        $this->updateWeatherService = $updateWeatherService;
    }

    /**
     * @param string $id
     * @param array $data
     * @return User
     * @throws RequestException
     */
    public function handle(string $id, array $data = []): User
    {
        /** @var User $user */
        $user = $this->userRepository->findOrFail($id);

        $user->update($data);

        $externalWeather = $this->getWeatherService->handle($user->latitude, $user->longitude);

        $weather = $this->getWeatherByUserId->handle($user->id);

        $this->updateWeatherService->handle($weather->id, [
            'user_id' => $user->id,
            'description' => json_encode($externalWeather),
            'synced_at' => now()
        ]);

        return $user;
    }
}
