<?php

namespace App\Domain\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mark extends Model
{
    protected $fillable = ['exam_id', 'student_id', 'score', 'max_score', 'grade_letter', 'remarks'];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }
}
