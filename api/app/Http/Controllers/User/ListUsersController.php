<?php

namespace App\Http\Controllers\User;

use App\Data\Services\User\Features\ListUsers;
use App\Data\Services\User\Features\PaginateUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ListUsersRequest;
use App\Http\Resources\User\UserCollection;
use Illuminate\Http\JsonResponse;

class ListUsersController extends Controller
{
    private PaginateUsers $paginateUsersService;

    /**
     * @param PaginateUsers $paginateUsersService
     */
    public function __construct(PaginateUsers $paginateUsersService)
    {
        $this->paginateUsersService = $paginateUsersService;
    }

    /**
     * @param ListUsersRequest $request
     * @return JsonResponse
     */
    public function __invoke(ListUsersRequest $request): JsonResponse
    {
        $perPage = $request->input('perPage', 30);
        $columns = $request->input('columns', ['*']);
        $pageName = $request->input('pageName', 'page');
        $page = $request->input('page');

        return response()->json(
            new UserCollection(
                $this->paginateUsersService->handle(
                    $perPage, $columns, $pageName, $page
                ))
        );
    }
}
