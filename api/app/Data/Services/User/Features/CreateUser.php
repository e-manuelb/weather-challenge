<?php

namespace App\Data\Services\User\Features;

use App\Domain\Models\User;
use Illuminate\Http\Client\RequestException;

interface CreateUser
{
    /**
     * @param array $data
     * @return User
     * @throws RequestException
     */
    public function handle(array $data): User;
}
