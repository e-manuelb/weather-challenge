<?php

namespace App\Data\Services\User;

use App\Data\Repositories\User\UserRepository;
use App\Data\Services\User\Features\PaginateUsers;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginateUsersService implements PaginateUsers
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
     * @param int|null $perPage
     * @param array|null $columns
     * @param string|null $pageName
     * @param int|null $page
     * @return LengthAwarePaginator
     */
    public function handle(
        ?int    $perPage = null,
        ?array  $columns = ['*'],
        ?string $pageName = 'page',
        ?int    $page = null
    ): LengthAwarePaginator
    {
        return $this->userRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
