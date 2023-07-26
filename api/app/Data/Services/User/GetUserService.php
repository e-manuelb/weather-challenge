<?php

namespace App\Data\Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\Features\GetUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GetUserService implements GetUser
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
     * @param String $id
     * @return Model|Collection|Builder|array|null
     */
    public function handle(String $id): Model|Collection|Builder|array|null
    {
        return $this->userRepository->findOrFail($id);
    }
}
