<?php

namespace App\Domain\Attendance\Repositories;

use App\Domain\Attendance\Models\Attendance;

class EloquentAttendanceRepository implements AttendanceRepositoryInterface
{
    public function forSession(int $sessionId): mixed
    {
        return Attendance::where('session_id', $sessionId)->with('student')->get();
    }

    public function find(int $id): ?Attendance
    {
        return Attendance::find($id);
    }
}
