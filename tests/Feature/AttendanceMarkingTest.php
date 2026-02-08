<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Attendance\DTOs\AttendanceMarkData;
use App\Domain\Attendance\Services\AttendanceService;

class AttendanceMarkingTest extends TestCase
{
    public function test_marks_attendance(): void
    {
        $this->markTestSkipped('Requires database and Laravel application context.');

        $service = new AttendanceService();
        $data = new AttendanceMarkData(1, 2, 'present', 'qr', 9);
        $result = $service->markAttendance($data);

        $this->assertSame('present', $result->status);
        $this->assertSame('qr', $result->method);
    }
}
