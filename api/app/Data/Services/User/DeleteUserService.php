<?php

namespace App\Data\Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\Features\DeleteUser;

class DeleteUserService implements DeleteUser
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $id
     * @return void
     */
    public function handle(string $id): void
    {
        $this->userRepository->deleteById($id);
    }
}
