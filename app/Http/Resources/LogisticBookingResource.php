<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\Locations\LocationResource;
use App\Http\Resources\Transportations\TransportationModeResource;


class LogisticBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'location_id' => $this->location_id,
            'location'       => new LocationResource($this->whenLoaded('location')),
            'transport_mode_id' => $this->transport_mode_id,
            'transport_mode' => new TransportationModeResource($this->whenLoaded('transportMode')),
            'goods_name' => $this->goods_name,
            'weight' => $this->weight,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'receiver_address' => $this->receiver_address,
            'receiver_email' => $this->receiver_email,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
