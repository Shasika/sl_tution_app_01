<?php

namespace App\Domain\Attendance\Services;

use App\Domain\Attendance\DTOs\AttendanceMarkData;
use App\Domain\Attendance\Models\Attendance;
use App\Domain\Students\Models\Enrollment;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    public function markAttendance(AttendanceMarkData $data): Attendance
    {
        return DB::transaction(function () use ($data) {
            $enrolled = Enrollment::where('student_id', $data->studentId)
                ->whereHas('batch.sessions', function ($query) use ($data) {
                    $query->where('id', $data->sessionId);
                })
                ->exists();

            if (!$enrolled) {
                throw new \RuntimeException('Student not enrolled for this session.');
            }

            return Attendance::updateOrCreate(
                [
                    'session_id' => $data->sessionId,
                    'student_id' => $data->studentId,
                ],
                [
                    'status' => $data->status,
                    'method' => $data->method,
                    'marked_by' => $data->markedBy,
                    'marked_at' => now(),
                    'notes' => $data->notes,
                ]
            );
        });
    }
}
