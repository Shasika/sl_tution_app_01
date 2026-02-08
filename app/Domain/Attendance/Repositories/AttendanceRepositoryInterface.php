<?php

namespace App\Domain\Attendance\Repositories;

use App\Domain\Attendance\Models\Attendance;

interface AttendanceRepositoryInterface
{
    public function forSession(int $sessionId): mixed;

    public function find(int $id): ?Attendance;
}
