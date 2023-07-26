<?php

namespace App\Data\Services\User\Features;

use Illuminate\Database\Eloquent\Collection;

interface ListUsers
{
    /**
     * @return Collection|array
     */
    public function handle(): Collection|array;
}
