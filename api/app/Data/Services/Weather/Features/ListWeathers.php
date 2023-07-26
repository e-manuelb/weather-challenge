<?php

namespace App\Data\Services\Weather\Features;

use Illuminate\Support\Collection;

interface ListWeathers
{
    /**
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function handle(): Collection|array;
}
