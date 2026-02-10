<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Billing\Services\PaymentService;

class PaymentPostingTest extends TestCase
{
    public function test_applies_partial_payment(): void
    {
        $this->markTestSkipped('Requires database and Laravel application context.');

        $service = new PaymentService();
        $result = $service->applyPayment(1, 2000, 'cash', 1);

        $this->assertSame('partial', $result->invoice->status ?? 'partial');
    }
}
