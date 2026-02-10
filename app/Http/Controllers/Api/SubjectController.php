<?php

namespace App\Http\Controllers\Api;

use App\Domain\Classes\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(): mixed
    {
        return Subject::paginate(25);
    }

    public function store(Request $request): Subject
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        return Subject::create($data);
    }

    public function update(Request $request, Subject $subject): Subject
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $subject->update($data);

        return $subject;
    }

    public function destroy(Subject $subject): array
    {
        $subject->delete();

        return ['status' => 'deleted'];
    }
}
