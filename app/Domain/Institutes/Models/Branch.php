<?php

namespace App\Domain\Institutes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    protected $fillable = ['institute_id', 'name', 'address', 'phone'];

    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }

    public function halls(): HasMany
    {
        return $this->hasMany(Hall::class);
    }
}
