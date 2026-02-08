<?php

namespace App\Http\Controllers\Api;

use App\Domain\Classes\Models\Batch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index(): mixed
    {
        return Batch::with(['course', 'hall'])->paginate(25);
    }

    public function store(Request $request): Batch
    {
        $data = $request->validate([
            'course_id' => ['required', 'integer'],
            'branch_id' => ['required', 'integer'],
            'hall_id' => ['nullable', 'integer'],
            'name' => ['required', 'string'],
            'capacity' => ['nullable', 'integer'],
            'status' => ['required', 'string'],
        ]);

        return Batch::create($data);
    }

    public function show(Batch $batch): Batch
    {
        return $batch->load('course', 'hall');
    }

    public function update(Request $request, Batch $batch): Batch
    {
        $data = $request->validate([
            'hall_id' => ['nullable', 'integer'],
            'name' => ['sometimes', 'string'],
            'capacity' => ['nullable', 'integer'],
            'status' => ['sometimes', 'string'],
        ]);

        $batch->update($data);

        return $batch;
    }

    public function destroy(Batch $batch): array
    {
        $batch->delete();

        return ['status' => 'deleted'];
    }
}
