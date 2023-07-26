<?php

namespace App\Http\Controllers\User;

use App\Data\Services\User\Features\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateUserController extends Controller
{
    private CreateUser $createUserService;

    /**
     * @param CreateUser $createUserService
     */
    public function __construct(CreateUser $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    /**
     * @param CreateUserRequest $request
     * @return JsonResponse
     * @throws RequestException
     */
    public function __invoke(CreateUserRequest $request): JsonResponse
    {
        return response()->json(new UserResource($this->createUserService->handle($request->validated())), Response::HTTP_CREATED);
    }
}
