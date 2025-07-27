<?php

namespace App\Http\Requests\Locations\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:countries,name'],
            'status' => ['required', 'boolean'],
        ];
    }
}
