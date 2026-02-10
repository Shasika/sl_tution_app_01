<?php

namespace App\Http\Controllers\Api;

use App\Domain\Students\DTOs\StudentRegistrationData;
use App\Domain\Students\Models\Student;
use App\Domain\Students\Services\EnrollmentService;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(private readonly EnrollmentService $enrollmentService)
    {
    }

    public function index(): mixed
    {
        return StudentResource::collection(Student::paginate(25));
    }

    public function store(Request $request): StudentResource
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'institute_code' => ['required', 'string'],
            'full_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'grade_id' => ['required', 'integer'],
            'school' => ['nullable', 'string'],
            'status' => ['required', 'string'],
            'dob' => ['nullable', 'date'],
            'gender' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'batch_id' => ['nullable', 'integer'],
            'guardians' => ['array'],
        ]);

        $dto = new StudentRegistrationData(
            $data['institute_code'],
            $data['full_name'],
            $data['phone'],
            $data['grade_id'],
            $data['school'] ?? null,
            $data['status'],
            $data['dob'] ?? null,
            $data['gender'] ?? null,
            $data['address'] ?? null,
            $data['guardians'] ?? []
        );

        $student = $this->enrollmentService->registerStudent($dto, $data['institute_id'], $data['batch_id'] ?? null);

        return new StudentResource($student);
    }

    public function show(Student $student): StudentResource
    {
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student): StudentResource
    {
        $data = $request->validate([
            'full_name' => ['sometimes', 'string'],
            'phone' => ['sometimes', 'string'],
            'grade_id' => ['sometimes', 'integer'],
            'school' => ['nullable', 'string'],
            'status' => ['sometimes', 'string'],
            'address' => ['nullable', 'string'],
        ]);

        $student->update($data);

        return new StudentResource($student);
    }

    public function destroy(Student $student): array
    {
        $student->delete();

        return ['status' => 'deleted'];
    }
}
