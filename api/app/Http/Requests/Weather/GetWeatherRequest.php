<?php

namespace App\Http\Requests\Weather;

use App\Domain\Constants\UnitTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetWeatherRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'latitude' => ['required', 'string', 'regex:/^[-+]?([1-8]?\d?|90)\.(\d+)?$/'],
            'longitude' => ['required', 'string', 'regex:/^[-+]?(1[0-7]\d?|8[0-9]|9[0-1])\.(\d+)?$/'],
            'units' => ['sometimes', 'string', Rule::in(UnitTypes::ALL)]
        ];
    }
}
