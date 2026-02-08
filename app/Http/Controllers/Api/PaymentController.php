<?php

namespace App\Http\Controllers\Api;

use App\Domain\Billing\Models\Payment;
use App\Domain\Billing\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private readonly PaymentService $paymentService)
    {
    }

    public function index(): mixed
    {
        return PaymentResource::collection(Payment::paginate(25));
    }

    public function store(Request $request): PaymentResource
    {
        $data = $request->validate([
            'invoice_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric'],
            'method' => ['required', 'string'],
            'received_by' => ['required', 'integer'],
        ]);

        $payment = $this->paymentService->applyPayment(
            $data['invoice_id'],
            $data['amount'],
            $data['method'],
            $data['received_by']
        );

        return new PaymentResource($payment);
    }
}
