<?php

namespace App\Http\Controllers\Api;

use App\Domain\Billing\DTOs\InvoiceData;
use App\Domain\Billing\Repositories\InvoiceRepositoryInterface;
use App\Domain\Billing\Services\InvoiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(
        private readonly InvoiceService $invoiceService,
        private readonly InvoiceRepositoryInterface $invoiceRepository
    ) {
    }

    public function index(): mixed
    {
        return InvoiceResource::collection($this->invoiceRepository->paginate());
    }

    public function store(Request $request): InvoiceResource
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
            'branch_code' => ['required', 'string'],
            'issue_date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'items' => ['required', 'array'],
            'discount' => ['nullable', 'numeric'],
            'late_fee' => ['nullable', 'numeric'],
        ]);

        $dto = new InvoiceData(
            $data['institute_id'],
            $data['student_id'],
            $data['branch_code'],
            $data['issue_date'],
            $data['due_date'],
            $data['items'],
            $data['discount'] ?? 0,
            $data['late_fee'] ?? 0
        );

        $invoice = $this->invoiceService->createInvoice($dto);

        return new InvoiceResource($invoice->load('items'));
    }

    public function show(int $invoiceId): InvoiceResource
    {
        $invoice = $this->invoiceRepository->find($invoiceId);

        return new InvoiceResource($invoice);
    }
}
