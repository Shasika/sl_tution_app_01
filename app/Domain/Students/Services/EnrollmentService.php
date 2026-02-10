<?php

namespace App\Domain\Students\Services;

use App\Domain\Students\DTOs\StudentRegistrationData;
use App\Domain\Students\Models\Enrollment;
use App\Domain\Students\Models\Guardian;
use App\Domain\Students\Models\Student;
use Illuminate\Support\Facades\DB;

class EnrollmentService
{
    public function registerStudent(StudentRegistrationData $data, int $instituteId, ?int $batchId = null): Student
    {
        return DB::transaction(function () use ($data, $instituteId, $batchId) {
            $year = now()->format('Y');
            $sequence = str_pad((string) (Student::where('institute_id', $instituteId)->count() + 1), 4, '0', STR_PAD_LEFT);
            $regNo = sprintf('%s-%s-%s', $data->instituteCode, $year, $sequence);

            $student = Student::create([
                'institute_id' => $instituteId,
                'reg_no' => $regNo,
                'full_name' => $data->fullName,
                'dob' => $data->dob,
                'gender' => $data->gender,
                'phone' => $data->phone,
                'address' => $data->address,
                'school' => $data->school,
                'grade_id' => $data->gradeId,
                'status' => $data->status,
            ]);

            foreach ($data->guardians as $guardianData) {
                $guardian = Guardian::firstOrCreate(
                    [
                        'institute_id' => $instituteId,
                        'phone' => $guardianData['phone'] ?? null,
                    ],
                    [
                        'name' => $guardianData['name'] ?? 'Guardian',
                        'relationship' => $guardianData['relationship'] ?? null,
                    ]
                );

                $student->guardians()->attach($guardian->id, [
                    'is_primary' => $guardianData['is_primary'] ?? false,
                ]);
            }

            if ($batchId) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'batch_id' => $batchId,
                    'enrolled_at' => now(),
                    'status' => 'active',
                ]);
            }

            return $student;
        });
    }
}
