<?php

namespace App\Domain\Billing\Events;

class InvoiceCreated
{
    public function __construct(
        public int $invoiceId,
        public int $studentId
    ) {
    }
}
