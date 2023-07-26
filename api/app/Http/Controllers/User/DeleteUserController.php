<?php

namespace App\Http\Controllers\User;

use App\Data\Services\User\Features\DeleteUser;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteUserController extends Controller
{
    private DeleteUser $deleteUserService;

    /**
     * @param DeleteUser $deleteUserService
     */
    public function __construct(DeleteUser $deleteUserService)
    {
        $this->deleteUserService = $deleteUserService;
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        $this->deleteUserService->handle($id);

        return response()->json([
            'message' => "User with ID #$id was deleted successfully."
        ]);
    }
}
