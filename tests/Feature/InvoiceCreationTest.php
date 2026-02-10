<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Billing\DTOs\InvoiceData;
use App\Domain\Billing\Services\InvoiceService;

class InvoiceCreationTest extends TestCase
{
    public function test_creates_invoice_totals(): void
    {
        $this->markTestSkipped('Requires database and Laravel application context.');

        $service = new InvoiceService();
        $data = new InvoiceData(1, 1, 'CMB', '2024-10-01', '2024-10-15', [
            ['description' => 'Fee', 'amount' => 3500],
        ], 0, 0);

        $result = $service->createInvoice($data);

        $this->assertSame(3500.0, (float) $result->subtotal);
        $this->assertSame(3500.0, (float) $result->total);
    }
}
