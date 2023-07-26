<?php

namespace App\Data\Services\User\Features;

use App\Domain\Models\User;

interface UpdateUser
{
    /**
     * @param string $id
     * @param array $data
     * @return User
     */
    public function handle(string $id, array $data = []): User;
}
