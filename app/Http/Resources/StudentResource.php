<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reg_no' => $this->reg_no,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'grade_id' => $this->grade_id,
            'status' => $this->status,
        ];
    }
}
