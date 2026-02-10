<?php

namespace App\Http\Controllers\Api;

use App\Domain\Classes\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(): mixed
    {
        return Schedule::with('batch')->paginate(25);
    }

    public function store(Request $request): Schedule
    {
        $data = $request->validate([
            'batch_id' => ['required', 'integer'],
            'day_of_week' => ['required', 'integer'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'effective_from' => ['required', 'date'],
            'effective_to' => ['nullable', 'date'],
        ]);

        return Schedule::create($data);
    }

    public function show(Schedule $schedule): Schedule
    {
        return $schedule->load('batch');
    }

    public function update(Request $request, Schedule $schedule): Schedule
    {
        $data = $request->validate([
            'day_of_week' => ['sometimes', 'integer'],
            'start_time' => ['sometimes'],
            'end_time' => ['sometimes'],
            'effective_from' => ['sometimes', 'date'],
            'effective_to' => ['nullable', 'date'],
        ]);

        $schedule->update($data);

        return $schedule;
    }

    public function destroy(Schedule $schedule): array
    {
        $schedule->delete();

        return ['status' => 'deleted'];
    }
}
