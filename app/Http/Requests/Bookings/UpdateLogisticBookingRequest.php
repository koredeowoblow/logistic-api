<?php

namespace App\Http\Requests\Bookings;
use App\Enums\LogisticBookingEnums;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLogisticBookingRequest extends FormRequest
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
            'location_id'       => 'sometimes|required|exists:locations,id',
            'transport_mode_id' => 'sometimes|required|exists:transport_modes,id',
            'goods_name'        => 'sometimes|required|string|max:255',
            'weight'            => 'sometimes|required|numeric|min:0.01',
            'receiver_name'     => 'sometimes|required|string|max:255',
            'receiver_email'    => 'sometimes|required|email|max:255',
            'receiver_phone'    => 'sometimes|required|string|max:20',
            'receiver_address'  => 'sometimes|required|string|max:500',
            'status' => 'sometimes|required|in:' . LogisticBookingEnums::CANCEL,

        ];
    }
}
