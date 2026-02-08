<?php

namespace App\Http\Controllers\Api;

use App\Domain\Students\Models\Guardian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index(): mixed
    {
        return Guardian::paginate(25);
    }

    public function store(Request $request): Guardian
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'relationship' => ['nullable', 'string'],
        ]);

        return Guardian::create($data);
    }

    public function update(Request $request, Guardian $guardian): Guardian
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string'],
            'phone' => ['nullable', 'string'],
            'relationship' => ['nullable', 'string'],
        ]);

        $guardian->update($data);

        return $guardian;
    }

    public function destroy(Guardian $guardian): array
    {
        $guardian->delete();

        return ['status' => 'deleted'];
    }
}
