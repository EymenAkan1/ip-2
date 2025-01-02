<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ParkingLot;
use App\Models\Reservation;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $vendor = Vendor::find($userId);
        $parkingLotsCount = ParkingLot::where('vendor_id', $userId)->count();
        $activeReservationsCount = Reservation::where('vendor_id', $userId)->where('reservation_status', 'confirmed')->count();
        $parkingLots = ParkingLot::where('vendor_id', $userId)->get();

        return view('vendor.dashboard', compact('parkingLotsCount', 'activeReservationsCount', 'parkingLots','vendor'));
    }

    public function edit($id)
    {
        $parkingLot = ParkingLot::where('vendor_id', auth()->user()->id)->findOrFail($id);

        return view('vendor.parking-lots.edit', compact('parkingLot'));
    }

    public function update(Request $request, $id)
    {
        $parkingLot = ParkingLot::where('vendor_id', auth()->user()->id)->findOrFail($id);

        $parkingLot->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'capacity' => $request->input('capacity'),
        ]);

        return redirect()->route('vendor.parking-lots.index')->with('success', 'Otopark başarıyla güncellendi.');
    }
}
