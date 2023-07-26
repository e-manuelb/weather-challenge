<?php

namespace App\Http\Controllers\User;

use App\Data\Services\User\Features\GetUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GetUserController extends Controller
{
    private GetUser $getUserService;

    /**
     * @param GetUser $getUserService
     */
    public function __construct(GetUser $getUserService)
    {
        $this->getUserService = $getUserService;
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        try {
            return response()->json(new UserResource($this->getUserService->handle($id)));
        } catch (Exception $exception) {
            return response()->json([
                'message' => "Cannot get user with ID #$id due the error: {$exception->getMessage()}."
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
