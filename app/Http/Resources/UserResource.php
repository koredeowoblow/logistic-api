<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'status' => $this->status,
            'last_login' => $this->last_login,
            'access_token' => $this->whenHas("token"),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
