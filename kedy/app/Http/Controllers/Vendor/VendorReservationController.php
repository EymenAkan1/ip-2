<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('vendor_id', auth()->user()->id)->get();
        return view('vendor.products.index', compact('reservations'));
    }


    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('vendor.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_start_time' => 'required',
            'reservation_end_time' => 'required',
            'duration_type' => 'required',
            'reservation_status' => 'required',
            'price' => 'required',
        ]);

        $reservation = reservation::findOrFail($id);
        $reservation->reservation_start_time = $request->reservation_start_time;
        $reservation->reservation_end_time = $request->reservation_end_time;
        $reservation->duration_type = $request->duration_type;
        $reservation->reservation_status = $request->reservation_status;
        $reservation->price = $request->price;
        $reservation->save();

        return redirect()->route('vendor.reservations.index')->with('success', 'Ürün başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('vendor.reservations.index')->with('success', 'Ürün başarıyla silindi.');
    }
}
