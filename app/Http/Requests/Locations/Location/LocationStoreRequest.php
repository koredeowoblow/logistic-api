<?php

namespace App\Http\Requests\Locations\Location;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
         return [
        'city' => ['required', 'string', 'max:255', 'unique:locations,city'], // 'locations' is your table name
        'country_id' => ['required', 'integer', 'exists:countries,id'],
        'state_id' => ['required', 'integer', 'exists:states,id'],
        'status' => ['required', 'boolean'],
    ];
    }
}
