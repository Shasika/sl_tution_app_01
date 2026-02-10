<?php

namespace App\Domain\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    protected $fillable = [
        'institute_id',
        'branch_id',
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
    ];

    protected $hidden = ['password'];

    public function institute(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Institute::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Branch::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
