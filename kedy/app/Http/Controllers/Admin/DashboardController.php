<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParkingLot;
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
        $staffCount = User::where('role', 'staff')->count();
        $vendorCount = User::where('role', 'vendor')->count();
        $vendor = User::where('role', 'vendor');
        $workerCount = User::where('role', 'worker')->count();
        $customerCount = User::where('role', 'customer')->count();
        $userCount = User::all()->count();
        $allparkinglotCount = ParkingLot::count();
        $openparkinglotCount = ParkingLot::where('is_open', '1')->count();

        return view('admin.dashboard', compact(
            'users',
            'reservations',
            'userCount',
            'staffCount',
            'vendorCount',
            'workerCount',
            'customerCount',
            'allparkinglotCount',
            'openparkinglotCount',
            'vendor'
        ));
    }
}
