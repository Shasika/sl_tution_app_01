<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MarkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'score' => $this->score,
            'max_score' => $this->max_score,
            'grade_letter' => $this->grade_letter,
        ];
    }
}
