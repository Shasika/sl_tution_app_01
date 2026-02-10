<?php

namespace App\Http\Controllers\Api;

use App\Domain\Classes\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(): mixed
    {
        return Grade::paginate(25);
    }

    public function store(Request $request): Grade
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        return Grade::create($data);
    }

    public function update(Request $request, Grade $grade): Grade
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $grade->update($data);

        return $grade;
    }

    public function destroy(Grade $grade): array
    {
        $grade->delete();

        return ['status' => 'deleted'];
    }
}
