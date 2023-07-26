<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        $data = $this->resource->toArray();

        return [
            'current_page' => $data['current_page'],
            'data' => $this->collection->each(function($user) {
                return new UserResource($user);
            }),
            'first_page_url' => $data['first_page_url'],
            'from' => $data['from'],
            'last_page' => $data['last_page'],
            'last_page_url' => $data['last_page_url'],
            'links' => $data['links'],
            'next_page_url' => $data['next_page_url'],
            'path' => $data['path'],
            'per_page' => $data['per_page'],
            'prev_page_url' => $data['prev_page_url'],
            'to' => $data['to'],
            'total' => $data['total']
        ];
    }
}
