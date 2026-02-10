<?php

namespace App\Domain\Students\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guardian extends Model
{
    protected $fillable = ['institute_id', 'name', 'phone', 'relationship'];

    public function institute(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Institute::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withPivot('is_primary');
    }
}
