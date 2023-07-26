<?php

namespace App\Http\Controllers\User;

use App\Data\Services\User\Features\UpdateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateUserController extends Controller
{
    private UpdateUser $updateUserService;

    /**
     * @param UpdateUser $updateUserService
     */
    public function __construct(UpdateUser $updateUserService)
    {
        $this->updateUserService = $updateUserService;
    }

    /**
     * @param string $id
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function __invoke(string $id, UpdateUserRequest $request): JsonResponse
    {
        try {
            $user = $this->updateUserService->handle($id, $request->validated());

            return response()->json(new UserResource($user));
        } catch (Exception $exception) {
            return response()->json([
                'message' => "Cannot update the User with ID #$id due the error: {$exception->getMessage()}."
            ]);
        }
    }
}
