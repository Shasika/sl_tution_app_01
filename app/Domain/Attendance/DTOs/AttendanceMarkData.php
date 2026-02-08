<?php

namespace App\Domain\Attendance\DTOs;

class AttendanceMarkData
{
    public function __construct(
        public int $sessionId,
        public int $studentId,
        public string $status,
        public string $method,
        public int $markedBy,
        public ?string $notes = null
    ) {
    }
}
