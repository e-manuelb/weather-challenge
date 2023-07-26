<?php

namespace App\Data\Services\User\Features;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GetUser
{
    /**
     * @param String $id
     * @return Model|Collection|Builder|array|null
     */
    public function handle(String $id): Model|Collection|Builder|array|null;
}
