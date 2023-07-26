<?php

namespace App\Data\Repositories\User;

use App\Data\Repositories\BaseRepository;
use App\Domain\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new User());
    }
}
