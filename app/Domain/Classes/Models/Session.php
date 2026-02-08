<?php

namespace App\Domain\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    protected $fillable = [
        'batch_id',
        'date',
        'start_time',
        'end_time',
        'hall_id',
        'status',
        'qr_token',
        'qr_expires_at',
    ];

    protected $casts = [
        'date' => 'date',
        'qr_expires_at' => 'datetime',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    public function hall(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Hall::class);
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(\App\Domain\Attendance\Models\Attendance::class);
    }
}
