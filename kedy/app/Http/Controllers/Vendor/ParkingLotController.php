<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ParkingLot;
use Illuminate\Http\Request;

class ParkingLotController extends Controller
{
    public function index()
    {
        $parkingLots = ParkingLot::where('vendor_id', auth()->id())->get();
        return view('vendor.parking_lots.index', compact('parkingLots'));
    }

    public function create()
    {
        return view('vendor.parking_lots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        ParkingLot::create([
            'vendor_id' => auth()->id(),
            'name' => $request->name,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'price_per_hour' => $request->price_per_hour,
        ]);

        return redirect()->route('vendor.parking_lots.index')->with('success', 'Otopark başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $parkingLot = ParkingLot::where('vendor_id', auth()->id())->findOrFail($id);
        return view('vendor.parking_lots.edit', compact('parkingLot'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        $parkingLot = ParkingLot::where('vendor_id', auth()->id())->findOrFail($id);
        $parkingLot->update($request->only(['name', 'location', 'capacity', 'price_per_hour']));

        return redirect()->route('vendor.parking_lots.index')->with('success', 'Otopark başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $parkingLot = ParkingLot::where('vendor_id', auth()->id())->findOrFail($id);
        $parkingLot->delete();

        return redirect()->route('vendor.parking_lots.index')->with('success', 'Otopark başarıyla silindi.');
    }
}
