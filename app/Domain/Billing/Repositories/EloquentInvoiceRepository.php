<?php

namespace App\Domain\Billing\Repositories;

use App\Domain\Billing\Models\Invoice;

class EloquentInvoiceRepository implements InvoiceRepositoryInterface
{
    public function find(int $id): ?Invoice
    {
        return Invoice::with('items')->find($id);
    }

    public function paginate(int $perPage = 25): mixed
    {
        return Invoice::with('student')->paginate($perPage);
    }
}
