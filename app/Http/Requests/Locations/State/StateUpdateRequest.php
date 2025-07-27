<?php

namespace App\Http\Requests\Locations\State;

use Illuminate\Foundation\Http\FormRequest;

class StateUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "sometimes|required|string",
            'country_id'=> 'sometimes|required|exists:countries,id',
            'status' => 'sometimes|required|boolean',
        ];
    }
}
