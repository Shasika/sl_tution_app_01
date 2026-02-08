<?php

namespace App\Http\Controllers\Api;

use App\Domain\Classes\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    public function index(): mixed
    {
        return Session::with(['batch', 'hall'])->paginate(25);
    }

    public function store(Request $request): Session
    {
        $data = $request->validate([
            'batch_id' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'hall_id' => ['nullable', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $data['qr_token'] = Str::random(32);
        $data['qr_expires_at'] = now()->addMinutes(30);

        return Session::create($data);
    }

    public function show(Session $session): Session
    {
        return $session->load('batch', 'hall');
    }

    public function update(Request $request, Session $session): Session
    {
        $data = $request->validate([
            'date' => ['sometimes', 'date'],
            'start_time' => ['sometimes'],
            'end_time' => ['sometimes'],
            'hall_id' => ['nullable', 'integer'],
            'status' => ['sometimes', 'string'],
        ]);

        $session->update($data);

        return $session;
    }

    public function destroy(Session $session): array
    {
        $session->delete();

        return ['status' => 'deleted'];
    }
}
