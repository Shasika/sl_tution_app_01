<?php

namespace App\Domain\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    protected $fillable = ['institute_id', 'batch_id', 'title', 'exam_date'];

    protected $casts = [
        'exam_date' => 'date',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Classes\Models\Batch::class);
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
}
