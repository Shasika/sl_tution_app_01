<?php

namespace App\Http\Controllers\Api;

use App\Domain\Exams\Models\Exam;
use App\Domain\Exams\Models\Mark;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Http\Resources\MarkResource;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(): mixed
    {
        return ExamResource::collection(Exam::paginate(25));
    }

    public function store(Request $request): ExamResource
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'batch_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'exam_date' => ['required', 'date'],
        ]);

        $exam = Exam::create($data);

        return new ExamResource($exam);
    }

    public function marks(int $examId): mixed
    {
        $marks = Mark::where('exam_id', $examId)->paginate(25);

        return MarkResource::collection($marks);
    }

    public function storeMarks(Request $request, int $examId): mixed
    {
        $data = $request->validate([
            'marks' => ['required', 'array'],
        ]);

        foreach ($data['marks'] as $mark) {
            Mark::updateOrCreate(
                ['exam_id' => $examId, 'student_id' => $mark['student_id']],
                [
                    'score' => $mark['score'],
                    'max_score' => $mark['max_score'],
                    'grade_letter' => $mark['grade_letter'] ?? null,
                    'remarks' => $mark['remarks'] ?? null,
                ]
            );
        }

        return ['status' => 'saved'];
    }
}
