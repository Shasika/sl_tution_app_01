<?php

namespace App\Http\Controllers\Api;

use App\Domain\Notifications\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(): mixed
    {
        return Notification::paginate(25);
    }

    public function store(Request $request): Notification
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'channel' => ['required', 'string'],
            'to' => ['required', 'string'],
            'template_key' => ['required', 'string'],
            'payload_json' => ['required', 'array'],
        ]);

        return Notification::create($data);
    }

    public function update(Request $request, Notification $notification): Notification
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
            'sent_at' => ['nullable', 'date'],
        ]);

        $notification->update($data);

        return $notification;
    }
}
