<?php

namespace App\Http\Requests\Transportations;

use Illuminate\Foundation\Http\FormRequest;

class TransportationModelRequest extends FormRequest
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
            'name' => ['required','string'],
            'category_id' => ['required','string','exists:transportation_mode_categories,id'],
            'description' => ['nullable','string']
        ];
    }
}
