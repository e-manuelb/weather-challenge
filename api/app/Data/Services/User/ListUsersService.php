<?php

namespace App\Data\Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\Features\ListUsers;
use Illuminate\Database\Eloquent\Collection;

class ListUsersService implements ListUsers
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
     * @return Collection|array
     */
    public function handle(): Collection|array
    {
        return $this->userRepository->get();
    }
}
