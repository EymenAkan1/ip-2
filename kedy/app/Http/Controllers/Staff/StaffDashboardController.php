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

    public function getDistricts($city_id)
    {
        // Veritabanından şehir ID'sine bağlı ilçeleri al
        $districts = District::where('city_id', $city_id)->get();
        return response()->json($districts);
    }

    // İlçe seçildiğinde mahalleleri al
    public function getTowns($district_id)
    {
        // Veritabanından ilçe ID'sine bağlı mahalleleri al
        $towns = Town::where('district_id', $district_id)->get();
        return response()->json($towns);
    }

    // İlçe seçildiğinde mahalleleri al
    public function getNeighbourhoods($town_id)
    {
        // Veritabanından ilçe ID'sine bağlı mahalleleri al
        $neighbourhoods = Neighbourhood::where('town_id', $town_id)->get();
        return response()->json($neighbourhoods);
    }

    // Veri ekleme işlemi
    public function storeParkingLot(Request $request)
    {
        // Formdan gelen verileri doğrulama
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'City' => 'required|exists:cities,id',
            'district' => 'required|exists:districts,id',
            'town' => 'required|exists:towns,id',
            'neighbourhood' => 'required|exists:neighbourhoods,id',
            'capacity' => 'required|integer|min:1',
            'available_capacity' => 'required|integer|min:0',
            'is_open' => 'nullable|boolean',
            'type' => 'nullable|string',
            'is_available' => 'nullable|boolean',
            'has_valet_service' => 'nullable|boolean',
            'has_cleaning_service' => 'nullable|boolean',
            'has_electric_car_charging' => 'nullable|boolean',
        ]);

        // Yeni otopark verisini kaydetme
        ParkingLot::create([
            'vendor_id' => $request->vendor_id,
            'name' => $request->name,
            'description' => $request->description,
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

        return redirect()->route('staff.create')->with('success', 'Otopark başarıyla kaydedildi.');
    }
}
