<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($this->id)],
            'latitude' => ['sometimes', 'string', 'regex:/^[-+]?([1-8]?\d?|90)\.(\d+)?$/'],
            'longitude' => ['sometimes', 'string', 'regex:/^[-+]?(1[0-7]\d?|8[0-9]|9[0-1])\.(\d+)?$/'],
        ];
    }
}
