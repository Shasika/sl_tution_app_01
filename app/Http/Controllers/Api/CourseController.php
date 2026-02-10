<?php

namespace App\Http\Controllers\Api;

use App\Domain\Classes\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(): mixed
    {
        return Course::with(['teacher', 'batches'])->paginate(25);
    }

    public function store(Request $request): Course
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'subject_id' => ['required', 'integer'],
            'grade_id' => ['required', 'integer'],
            'teacher_id' => ['nullable', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'fee_plan_id' => ['nullable', 'integer'],
            'status' => ['required', 'string'],
        ]);

        return Course::create($data);
    }

    public function show(Course $course): Course
    {
        return $course->load('teacher', 'batches');
    }

    public function update(Request $request, Course $course): Course
    {
        $data = $request->validate([
            'title' => ['sometimes', 'string'],
            'description' => ['nullable', 'string'],
            'teacher_id' => ['nullable', 'integer'],
            'fee_plan_id' => ['nullable', 'integer'],
            'status' => ['sometimes', 'string'],
        ]);

        $course->update($data);

        return $course;
    }

    public function destroy(Course $course): array
    {
        $course->delete();

        return ['status' => 'deleted'];
    }
}
