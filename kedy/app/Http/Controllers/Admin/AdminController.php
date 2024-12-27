<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $reservations = Reservation::all();

        $staffCount = User::where('role', 'staff')->count();

        $vendorCount = User::where('role', 'vendor')->count();

        $workerCount = User::where('role', 'worker')->count();

        $customerCount = User::where('role', 'customer')->count();

        return view('admin.dashboard', compact('users', 'reservations', 'staffCount', 'vendorCount', 'workerCount', 'customerCount'));
    }

}
