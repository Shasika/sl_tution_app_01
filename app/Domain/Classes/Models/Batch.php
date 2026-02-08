<?php

namespace App\Domain\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Batch extends Model
{
    protected $fillable = ['course_id', 'branch_id', 'hall_id', 'name', 'capacity', 'status'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Branch::class);
    }

    public function hall(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Hall::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
