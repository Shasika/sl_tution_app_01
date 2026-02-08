<?php

namespace App\Domain\Billing\DTOs;

class InvoiceData
{
    public function __construct(
        public int $instituteId,
        public int $studentId,
        public string $branchCode,
        public string $issueDate,
        public string $dueDate,
        public array $items,
        public float $discount = 0,
        public float $lateFee = 0
    ) {
    }
}
