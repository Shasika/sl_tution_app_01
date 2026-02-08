<?php

namespace App\Providers;

use App\Domain\Attendance\Repositories\AttendanceRepositoryInterface;
use App\Domain\Attendance\Repositories\EloquentAttendanceRepository;
use App\Domain\Billing\Repositories\EloquentInvoiceRepository;
use App\Domain\Billing\Repositories\InvoiceRepositoryInterface;
use App\Domain\Students\Repositories\EloquentStudentRepository;
use App\Domain\Students\Repositories\StudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, EloquentStudentRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, EloquentInvoiceRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class, EloquentAttendanceRepository::class);
    }

    public function boot(): void
    {
    }
}
