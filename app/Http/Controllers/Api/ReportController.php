<?php

namespace App\Http\Controllers\Api;

use App\Domain\Attendance\Models\Attendance;
use App\Domain\Billing\Models\Invoice;
use App\Domain\Billing\Models\Payment;
use App\Domain\Classes\Models\Course;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function collections(): array
    {
        $daily = Payment::selectRaw('date(paid_at) as date, sum(amount) as total')
            ->groupBy('date')
            ->orderByDesc('date')
            ->limit(30)
            ->get();

        return ['data' => $daily];
    }

    public function arrears(): array
    {
        $arrears = Invoice::whereIn('status', ['unpaid', 'partial'])
            ->orderByDesc('due_date')
            ->limit(50)
            ->get();

        return ['data' => $arrears];
    }

    public function classPerformance(): array
    {
        $courses = Course::withCount('batches')->limit(25)->get();

        return ['data' => $courses];
    }
}
