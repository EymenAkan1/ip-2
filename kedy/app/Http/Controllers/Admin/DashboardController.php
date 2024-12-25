<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Burada User modelini dahil ediyoruz
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all(); // Tüm kullanıcıları al
        return view('admin.dashboard', compact('users'));
    }
}
