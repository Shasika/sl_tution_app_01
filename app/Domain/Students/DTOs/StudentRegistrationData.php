<?php

namespace App\Domain\Students\DTOs;

class StudentRegistrationData
{
    public function __construct(
        public string $instituteCode,
        public string $fullName,
        public string $phone,
        public int $gradeId,
        public ?string $school,
        public string $status,
        public ?string $dob = null,
        public ?string $gender = null,
        public ?string $address = null,
        public array $guardians = []
    ) {
    }
}
