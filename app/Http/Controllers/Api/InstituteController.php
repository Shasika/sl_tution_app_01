<?php

namespace App\Http\Controllers\Api;

use App\Domain\Institutes\Models\Institute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index(): mixed
    {
        return Institute::paginate(25);
    }

    public function store(Request $request): Institute
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:20'],
            'status' => ['required', 'string'],
        ]);

        return Institute::create($data);
    }

    public function show(Institute $institute): Institute
    {
        return $institute;
    }

    public function update(Request $request, Institute $institute): Institute
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'code' => ['sometimes', 'string', 'max:20'],
            'status' => ['sometimes', 'string'],
        ]);

        $institute->update($data);

        return $institute;
    }

    public function destroy(Institute $institute): array
    {
        $institute->delete();

        return ['status' => 'deleted'];
    }
}
