<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'property' => new PropertyResource($this->property), // Format property details using PropertyResource
            'created_at' => $this->created_at->format('d M Y'), // Example: 03 Jul 2024
            'updated_at' => $this->updated_at->format('d M Y'),
        ];
    }
}
