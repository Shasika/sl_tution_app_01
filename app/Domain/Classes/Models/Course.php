<?php

namespace App\Domain\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'institute_id',
        'subject_id',
        'grade_id',
        'teacher_id',
        'title',
        'description',
        'fee_plan_id',
        'status',
    ];

    public function institute(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Institute::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'teacher_id');
    }

    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }
}
