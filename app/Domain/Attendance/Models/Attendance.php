<?php

namespace App\Domain\Attendance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'session_id',
        'student_id',
        'status',
        'marked_by',
        'marked_at',
        'method',
        'notes',
    ];

    protected $casts = [
        'marked_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Classes\Models\Session::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Students\Models\Student::class);
    }
}
