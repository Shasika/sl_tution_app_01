<?php

namespace App\Domain\Billing\Services;

use App\Domain\Billing\DTOs\InvoiceData;
use App\Domain\Billing\Models\Invoice;
use App\Domain\Billing\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;

class InvoiceService
{
    public function createInvoice(InvoiceData $data): Invoice
    {
        return DB::transaction(function () use ($data) {
            $period = now()->format('Ym');
            $seq = str_pad((string) (Invoice::where('institute_id', $data->instituteId)->count() + 1), 4, '0', STR_PAD_LEFT);
            $invoiceNo = sprintf('INV-%s-%s-%s', $data->branchCode, $period, $seq);

            $subtotal = array_sum(array_column($data->items, 'amount'));
            $total = $subtotal - $data->discount + $data->lateFee;

            $invoice = Invoice::create([
                'institute_id' => $data->instituteId,
                'student_id' => $data->studentId,
                'invoice_no' => $invoiceNo,
                'issue_date' => $data->issueDate,
                'due_date' => $data->dueDate,
                'subtotal' => $subtotal,
                'discount' => $data->discount,
                'late_fee' => $data->lateFee,
                'total' => $total,
                'status' => 'unpaid',
            ]);

            foreach ($data->items as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'description' => $item['description'],
                    'batch_id' => $item['batch_id'] ?? null,
                    'session_id' => $item['session_id'] ?? null,
                    'qty' => $item['qty'] ?? 1,
                    'unit_price' => $item['unit_price'] ?? $item['amount'],
                    'amount' => $item['amount'],
                ]);
            }

            return $invoice;
        });
    }
}
