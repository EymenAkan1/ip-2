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
    public function index()
    {
        $vendors = Vendor::all();
        $parkinglots = ParkingLot::all();
        $cities = City::orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $towns = Town::orderBy('name', 'asc')->get();
        $neighbourhoods = Neighbourhood::orderBy('name', 'asc')->get();

        $parkingLotTypes = [
            'indoor' => 'Indoor',
            'outdoor' => 'Outdoor',
            'garage' => 'Garage',
            'underground' => 'Underground',
            'building' => 'Building',
            'smart' => 'Smart'
        ];

        return view('staff.dashboard', compact('vendors', 'parkinglots', 'cities', 'districts', 'towns', 'neighbourhoods', 'parkingLotTypes'));
    }

    public function getDistricts($city_id)
    {
        $districts = District::where('city_id', $city_id)->get();
        return response()->json($districts);
    }

    public function getTowns($district_id)
    {
        $towns = Town::where('district_id', $district_id)->get();
        return response()->json($towns);
    }

    public function getNeighbourhoods($town_id)
    {
        $neighbourhoods = Neighbourhood::where('town_id', $town_id)->get();
        return response()->json($neighbourhoods);
    }


    public function storeParkingLot(Request $request)
    {

        \Log::info('Gelen Form Verileri:', $request->all());
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'ParkingLot_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'town_id' => 'required|exists:towns,id',
            'neighbourhood_id' => 'required|exists:neighbourhoods,id',
            'capacity' => 'required|integer|min:1',
            'available_capacity' => 'required|integer|min:1|max:' . $request->capacity,
            'is_open' => 'nullable|boolean',
            'type' => 'required|string|max:255',
            'is_available' => 'nullable|boolean',
            'has_electric_car_charging' => 'nullable|boolean',
            'has_valet_service' => 'nullable|boolean',
            'has_cleaning_service' => 'nullable|boolean',
        ]);

        ParkingLot::create([
            'vendor_id' => $validated['vendor_id'],
            'name' => $validated['ParkingLot_name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'city_id' => $validated['city_id'],
            'district_id' => $validated['district_id'],
            'town_id' => $validated['town_id'],
            'neighbourhood_id' => $validated['neighbourhood_id'],
            'capacity' => $validated['capacity'],
            'available_capacity' => $validated['available_capacity'],
            'is_open' => $validated['is_open'] ?? 0,
            'type' => $validated['type'],
            'is_available' => $validated['is_available'] ?? 0,
            'has_electric_car_charging' => $request->boolean('has_electric_car_charging'),
            'has_valet_service' => $request->boolean('has_valet_service'),
            'has_cleaning_service' => $request->boolean('has_cleaning_service'),
        ]);


        // Kullanıcıyı bir yere yönlendir
        return back()->with('success', 'Otopark başarıyla eklendi.');
    }
}
