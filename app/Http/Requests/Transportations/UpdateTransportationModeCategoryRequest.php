<?php

namespace App\Http\Requests\Transportations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTransportationModeCategoryRequest extends FormRequest
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
        $id = $this->route('id');

        $rules['name'][] = Rule::unique('transport_modes', 'name')->ignore($id);
        $rules['slug'][] = Rule::unique('transport_modes', 'slug')->ignore($id);


        return $rules;
    }
}
