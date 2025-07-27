<?php

namespace App\Http\Requests\Bookings;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\LogisticBookingEnums;

class ChangeBookingStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'in:' . implode(',', LogisticBookingEnums::values())],
        ];
    }
}
