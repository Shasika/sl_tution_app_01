<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'invoice_no' => $this->invoice_no,
            'student_id' => $this->student_id,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'late_fee' => $this->late_fee,
            'total' => $this->total,
            'status' => $this->status,
            'items' => InvoiceItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
