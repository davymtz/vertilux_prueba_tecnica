<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->order_id,
            'reference' => $this->reference,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'status_order' => $this->status,
            'method' => $this->method,
            'channel' => $this->channel,
            'date_order' => $this->created_date_order
        ];
    }
}
