<?php

namespace App\Domain\Notifications\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'institute_id',
        'channel',
        'to',
        'template_key',
        'payload_json',
        'status',
        'sent_at',
    ];

    protected $casts = [
        'payload_json' => 'array',
        'sent_at' => 'datetime',
    ];
}
