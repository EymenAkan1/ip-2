<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class VendorDashboardController extends Controller
{
    public function index(){
        $reservations = Reservation::where('customer_id', auth()->id())->get();
        return view('vendor.dashboard_index', compact('reservations'));
    }

    public function edit($id){
        $reservation = Reservation::where('customer_id', auth::id())->FindOrFail($id);
        return view('vendor.dashboard_edit', compact('reservation'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'reservation_start_time' => 'required',
            'reservation_end_time' => 'required',
            'duration_type' => 'required',
            'reservation_status' => 'required',
            'price' => 'required',
        ]);

        $reservation = Reservation::where('customer_id', auth()->id())->FindOrFail($id);
        $reservation->update([$validated]);

        return redirect()->route('vendor.dashboard');
    }
}
