<?php

namespace App\Http\Controllers\Staff;

use App\Models\Vendor;
use App\Models\ParkingLot;
use App\Models\City;
use App\Models\District;
use App\Models\Town;
use App\Models\Neighbourhood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffDashboardController extends Controller
{
    // Dashboard sayfasını görüntüle
    public function index()
    {
        // Vendor ve parkinglots verilerini al
        $vendors = Vendor::all();
        $parkinglots = ParkingLot::all();
        $cities = City::orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $towns = Town::orderBy('name', 'asc')->get();
        $neighbourhoods = Neighbourhood::orderBy('name', 'asc')->get();


        return view('staff.dashboard', compact('vendors', 'parkinglots', 'cities', 'districts', 'towns', 'neighbourhoods'));
    }

    // Veri ekleme işlemi
    public function store(Request $request)
    {
        // Formdan gelen verileri doğrulama
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'parking_lot_id' => 'required|exists:parking_lots,id',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'is_open' => 'required|boolean',
            'has_valet_service' => 'required|boolean',
            'has_cleaning_service' => 'required|boolean',
            'has_electric_car_charging' => 'required|boolean',
        ]);

        // Yeni otopark verisini kaydetme
        ParkingLot::create([
            'vendor_id' => $request->vendor_id,
            'name' => $request->name,
            'location' => $request->location,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'town_id' => $request->town_id,
            'neighbourhood_id' => $request->neighbourhood_id,
            'capacity' => $request->capacity,
            'available_capacity' => $request->available_capacity,
            'is_open' => $request->is_open,
            'type' => $request->type,
            'has_valet_service' => $request->has_valet_service,
            'has_cleaning_service' => $request->has_cleaning_service,
            'has_electric_car_charging' => $request->has_electric_car_charging,
        ]);

        return redirect()->back()->with('success', 'Yeni otopark başarıyla kaydedildi.');
    }
}
