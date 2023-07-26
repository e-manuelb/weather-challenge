<?php

namespace App\Data\Observers;

use App\Domain\Models\User;
use Ramsey\Uuid\Uuid;

class UserObserver
{
    /**
     * @param User $user
     * @return void
     */
    public function creating(User $user): void
    {
        $user->id = Uuid::uuid7();
    }
}
