<?php

namespace App\Domain\Billing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeePlan extends Model
{
    protected $fillable = ['institute_id', 'type', 'amount', 'currency', 'rules_json'];

    protected $casts = [
        'rules_json' => 'array',
    ];

    public function institute(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Institute::class);
    }
}
