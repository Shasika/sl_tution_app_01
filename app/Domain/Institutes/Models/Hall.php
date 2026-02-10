<?php

namespace App\Domain\Institutes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hall extends Model
{
    protected $fillable = ['branch_id', 'name', 'capacity'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
