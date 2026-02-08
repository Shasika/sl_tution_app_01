<?php

namespace App\Domain\Billing\Repositories;

use App\Domain\Billing\Models\Invoice;

interface InvoiceRepositoryInterface
{
    public function find(int $id): ?Invoice;

    public function paginate(int $perPage = 25): mixed;
}
