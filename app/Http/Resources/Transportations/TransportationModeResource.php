<?php

namespace App\Http\Resources\Transportations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransportationModeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "category_name" => $this->when(
                $this->relationLoaded('category') && $this->category,
                fn() => $this->category->name
            ),
            "category_id" => $this->category_id,
            "description" => $this->description,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
