<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::with('user')->latest()->paginate(15);

        return view('admin.audit_logs.index', compact('logs'));
    }

    public function show(AuditLog $auditLog)
    {
        return view('admin.audit_logs.show', compact('auditLog'));
    }
}
