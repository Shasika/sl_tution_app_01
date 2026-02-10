<?php

namespace App\Http\Controllers\Api;

use App\Domain\Notifications\Models\AuditLog;
use App\Http\Controllers\Controller;

class AuditLogController extends Controller
{
    public function index(): mixed
    {
        return AuditLog::orderByDesc('created_at')->paginate(25);
    }
}
