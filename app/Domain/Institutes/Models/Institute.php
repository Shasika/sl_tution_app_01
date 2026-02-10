<?php

namespace App\Domain\Institutes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institute extends Model
{
    protected $fillable = ['name', 'code', 'settings_json', 'status'];

    protected $casts = [
        'settings_json' => 'array',
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
