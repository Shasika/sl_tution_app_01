<?php

namespace App\Http\Controllers\Api;

use App\Domain\Institutes\Models\Hall;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index(): mixed
    {
        return Hall::with('branch')->paginate(25);
    }

    public function store(Request $request): Hall
    {
        $data = $request->validate([
            'branch_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:0'],
        ]);

        return Hall::create($data);
    }

    public function show(Hall $hall): Hall
    {
        return $hall->load('branch');
    }

    public function update(Request $request, Hall $hall): Hall
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'capacity' => ['sometimes', 'integer', 'min:0'],
        ]);

        $hall->update($data);

        return $hall;
    }

    public function destroy(Hall $hall): array
    {
        $hall->delete();

        return ['status' => 'deleted'];
    }
}
