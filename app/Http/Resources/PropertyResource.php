<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'agent_id' => $this->agent_id,
            'property_type' => $this->property_type,
            'status' => $this->status,
            'price' => $this->price,
            'max_rooms' => $this->max_rooms,
            'beds' => $this->beds,
            'baths' => $this->baths,
            'area' => $this->area,
            'description' => $this->description,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
            'payment_type' => $this->payment_type,
            'token_amount' => $this->token_amount,
            'additional_features' => $this->additional_features,
            'property_status' => $this->property_status,
            'images' => $this->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image_url' => asset($image->image_url),
                    'alt_text' => $image->alt_text,
                ];
            }),
        ];
    }
}
