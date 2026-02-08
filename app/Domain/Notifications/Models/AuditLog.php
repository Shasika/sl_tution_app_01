<?php

namespace App\Domain\Notifications\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'institute_id',
        'user_id',
        'action',
        'entity_type',
        'entity_id',
        'before_json',
        'after_json',
        'ip',
    ];

    protected $casts = [
        'before_json' => 'array',
        'after_json' => 'array',
    ];
}
