<?php

namespace App\Domain\Billing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'institute_id',
        'student_id',
        'invoice_no',
        'issue_date',
        'due_date',
        'subtotal',
        'discount',
        'late_fee',
        'total',
        'status',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
    ];

    public function institute(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Institutes\Models\Institute::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(\App\Domain\Students\Models\Student::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
