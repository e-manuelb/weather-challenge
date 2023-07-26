<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Weather\WeatherResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'weather' => $this->weather,
            '_links' => [
                [
                    'rel' => 'self',
                    'type' => 'GET',
                    'href' => route('user.get', ['id' => $this->id])
                ],
                [
                    'rel' => 'update',
                    'type' => 'PUT',
                    'href' => route('user.update', ['id' => $this->id])
                ],
                [
                    'rel' => 'delete',
                    'type' => 'DELETE',
                    'href' => route('user.delete', ['id' => $this->id])
                ]
            ]
        ];
    }
}
