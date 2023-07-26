<?php

namespace App\Data\Services\User\Features;

interface DeleteUser
{
    /**
     * @param string $id
     * @return void
     */
    public function handle(string $id): void;
}
