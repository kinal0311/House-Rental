<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AgentResource;

class BookingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'property' => new PropertyResource($this->property),
            'agent' => new AgentResource($this->agent),
            'payment_option' => $this->payment_option,
            'deposit' => $this->deposit,
            'amount' => $this->amount,
            'payment_status' => $this->getPaymentStatus(),
            'created_at' => $this->created_at->format('d M Y'), // Example: 03 Jul 2024
            'updated_at' => $this->updated_at->format('d M Y'),
        ];
    }

    private function getPaymentStatus()
    {
        $statusMap = [
            1 => 'Pending',
            2 => 'Paid',
            3 => 'Failed',
        ];
        return $statusMap[$this->payment_status] ?? 'Unknown';
    }
}

