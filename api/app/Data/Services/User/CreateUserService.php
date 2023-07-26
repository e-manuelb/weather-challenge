<?php

namespace App\Data\Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\External\OpenWeather\Features\GetWeather;
use App\Data\Services\User\Features\CreateUser;
use App\Data\Services\Weather\Features\CreateWeather;
use App\Domain\Models\User;
use Illuminate\Http\Client\RequestException;

class CreateUserService implements CreateUser
{
    /*
     * Repository instance
     */
    private UserRepository $userRepository;

    /*
     * Services instances
     */
    private GetWeather $getWeatherService;
    private CreateWeather $createWeatherService;

    /**
     * @param UserRepository $userRepository
     * @param GetWeather $getWeatherService
     * @param CreateWeather $createWeatherService
     */
    public function __construct(UserRepository $userRepository, GetWeather $getWeatherService, CreateWeather $createWeatherService)
    {
        $this->userRepository = $userRepository;
        $this->getWeatherService = $getWeatherService;
        $this->createWeatherService = $createWeatherService;
    }

    /**
     * @param array $data
     * @return User
     * @throws RequestException
     */
    public function handle(array $data): User
    {
        $data['synced_at'] = now();

        /** @var User $user */
        $user = $this->userRepository->create($data);

        $externalWeather = $this->getWeatherService->handle($user->latitude, $user->longitude);

        $this->createWeatherService->handle([
            'user_id' => $user->id,
            'description' => json_encode($externalWeather),
            'synced_at' => now()
        ]);

        return $user;
    }
}
