<?php

namespace App\Http\Controllers\Api;

use App\Domain\Institutes\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(): mixed
    {
        return Branch::with('institute')->paginate(25);
    }

    public function store(Request $request): Branch
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        return Branch::create($data);
    }

    public function show(Branch $branch): Branch
    {
        return $branch->load('institute');
    }

    public function update(Request $request, Branch $branch): Branch
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $branch->update($data);

        return $branch;
    }

    public function destroy(Branch $branch): array
    {
        $branch->delete();

        return ['status' => 'deleted'];
    }
}
