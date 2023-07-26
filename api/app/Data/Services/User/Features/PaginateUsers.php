<?php

namespace App\Data\Services\User\Features;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PaginateUsers
{
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
    ): LengthAwarePaginator;
}
