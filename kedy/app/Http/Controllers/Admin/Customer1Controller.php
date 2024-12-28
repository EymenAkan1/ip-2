<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParkingLot;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class Customer1Controller extends Controller
{
    public function index()
    {
        $users = User::all();
        $customers = User::where('role', 'customer')->get();
        $workerCount = User::where('role', 'worker')->count();
        $customerCount = User::where('role', 'customer')->count();
        $userCount = User::all()->count();
        $allparkinglotCount = ParkingLot::count();
        $openparkinglotCount = ParkingLot::where('is_open', '1')->count();

        return view('admin.customers_index', compact(

            'users',
            'customers',
            'userCount',
            'workerCount',
            'customerCount',
            'allparkinglotCount',
            'openparkinglotCount',
        ));
    }
}
