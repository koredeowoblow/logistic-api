<?php

namespace App\Http\Requests\Bookings;
use App\Enums\LogisticBookingEnums;
use Illuminate\Foundation\Http\FormRequest;

class StoreLogisticBookingRequest extends FormRequest
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
            'location_id'       => 'required|exists:locations,id',
            'transport_mode_id' => 'required|exists:transport_modes,id',
            'goods_name'        => 'required|string|max:255',
            'weight'            => 'required|numeric|min:0.01',
            'receiver_name'     => 'required|string|max:255',
            'receiver_email'    => 'required|email|max:255',
            'receiver_phone'    => 'required|string|max:20',
            'receiver_address'  => 'required|string|max:500',
            'status' => 'required|string|in:' . implode(',',
            [
                LogisticBookingEnums::DRAFT,
                LogisticBookingEnums::CONFIRMED,
                LogisticBookingEnums::SHIPPED,
                LogisticBookingEnums::ARRIVED,
                LogisticBookingEnums::DELIVERED,
            ]),
        ];
    }
}
