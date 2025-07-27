<?php

namespace App\Http\Requests\Locations\Location;

use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return [
        'city' => ['sometimes', 'string', 'max:255', 'unique:locations,city,' . $this->route('location')],
        'country_id' => ['sometimes', 'integer', 'exists:countries,id'],
        'state_id' => ['sometimes', 'integer', 'exists:states,id'],
        'status' => ['sometimes', 'boolean'],
       ];
}

}
