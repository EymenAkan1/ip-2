<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AuditLogController;
use App\Models\AuditLog;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $reservations = Reservation::all();
        $log = AuditLog::all();
        $logs = log::notice($log);
        return view('admin.dashboard', compact('users', 'reservations', 'logs',));
    }
}
