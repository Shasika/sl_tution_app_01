<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Students\DTOs\StudentRegistrationData;
use App\Domain\Students\Services\EnrollmentService;

class StudentEnrollmentTest extends TestCase
{
    public function test_registers_student(): void
    {
        $this->markTestSkipped('Requires database and Laravel application context.');

        $service = new EnrollmentService();
        $data = new StudentRegistrationData('LAKB', 'Test Student', '0770000000', 10, null, 'active');
        $result = $service->registerStudent($data, 1, null);

        $this->assertSame('Test Student', $result->full_name);
        $this->assertSame('active', $result->status);
    }
}
