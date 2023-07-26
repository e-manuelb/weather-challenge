<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ListUsersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'perPage' => ['sometimes', 'integer'],
            'columns' => ['sometimes', 'array'],
            'pageName' => ['sometimes', 'string'],
            'page' => ['sometimes', 'integer']
        ];
    }
}
