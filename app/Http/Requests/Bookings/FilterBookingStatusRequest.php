<?php

namespace App\Http\Requests\Bookings;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\LogisticBookingEnums;

class FilterBookingStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['nullable', 'in:' . implode(',', LogisticBookingEnums::values())],
        ];
    }
    public function status(): ?string
    {
        return $this->query('status'); // safely fetch ?status= from query string
    }
}
