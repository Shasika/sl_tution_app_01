<?php

namespace App\Http\Controllers\Api;

use App\Domain\Attendance\DTOs\AttendanceMarkData;
use App\Domain\Attendance\Repositories\AttendanceRepositoryInterface;
use App\Domain\Attendance\Services\AttendanceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(
        private readonly AttendanceService $attendanceService,
        private readonly AttendanceRepositoryInterface $attendanceRepository
    ) {
    }

    public function show(int $sessionId): mixed
    {
        $attendance = $this->attendanceRepository->forSession($sessionId);

        return AttendanceResource::collection($attendance);
    }

    public function store(Request $request): AttendanceResource
    {
        $data = $request->validate([
            'session_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'method' => ['required', 'string'],
            'marked_by' => ['required', 'integer'],
            'notes' => ['nullable', 'string'],
        ]);

        $dto = new AttendanceMarkData(
            $data['session_id'],
            $data['student_id'],
            $data['status'],
            $data['method'],
            $data['marked_by'],
            $data['notes'] ?? null
        );

        $attendance = $this->attendanceService->markAttendance($dto);

        return new AttendanceResource($attendance);
    }
}
