<?php

namespace App\Http\Controllers\Api;

use App\Domain\Students\Models\Enrollment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(): mixed
    {
        return Enrollment::with(['student', 'batch'])->paginate(25);
    }

    public function store(Request $request): Enrollment
    {
        $data = $request->validate([
            'student_id' => ['required', 'integer'],
            'batch_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $data['enrolled_at'] = now();

        return Enrollment::create($data);
    }

    public function update(Request $request, Enrollment $enrollment): Enrollment
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
            'left_at' => ['nullable', 'date'],
        ]);

        $enrollment->update($data);

        return $enrollment;
    }

    public function destroy(Enrollment $enrollment): array
    {
        $enrollment->delete();

        return ['status' => 'deleted'];
    }
}
