<?php

namespace App\Domain\Billing\Services;

use App\Domain\Billing\Models\Invoice;
use App\Domain\Billing\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    public function applyPayment(int $invoiceId, float $paidAmount, string $method, int $receivedBy): Payment
    {
        return DB::transaction(function () use ($invoiceId, $paidAmount, $method, $receivedBy) {
            $invoice = Invoice::lockForUpdate()->findOrFail($invoiceId);

            $payment = Payment::create([
                'institute_id' => $invoice->institute_id,
                'student_id' => $invoice->student_id,
                'invoice_id' => $invoice->id,
                'amount' => $paidAmount,
                'method' => $method,
                'paid_at' => now(),
                'received_by' => $receivedBy,
            ]);

            $paidTotal = Payment::where('invoice_id', $invoice->id)->sum('amount');
            if ($paidTotal >= $invoice->total) {
                $invoice->status = 'paid';
            } elseif ($paidTotal > 0) {
                $invoice->status = 'partial';
            }
            $invoice->save();

            return $payment;
        });
    }
}
