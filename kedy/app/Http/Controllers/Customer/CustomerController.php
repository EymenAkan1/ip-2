<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\City;
use App\Models\ParkingLot;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    function index()
    {
        $reservations = Reservation::where('customer_id', auth()->id())->get();
        $carMakes = CarMake::orderBy('make', 'asc')->get();
        $carModels = CarModel::orderBy('model_name', 'asc')->get();
        $parkingLotTypes = ParkingLot::orderBy('type', 'asc')->get();

        return view('customer.dashboard', compact('reservations', 'carMakes', 'carModels', 'parkingLotTypes'));
    }

    public function getCarModels($makeId)
    {
        $models = CarMake::where('make_id', $makeId)->get();
        return response()->json($models);
    }

    public function getCarModel($makeId, $modelId)
    {
        $models = CarMake::where('make_id', $makeId)->get();
        return response()->json($models);
    }

    public function storeVehicle(Request $request)
    {
        \Log::info('Gelen Form Verileri:', $request->all());
        $validated = $request->validate([
            'customer_id' => 'required|exists:customer,id',
            'plate' => 'required|string|max:255',
            'make' => 'required|exists:car_makes,id',
            'model' => 'required|exists:car_models,id',
            'year' => 'date_format:Y|nullable',
            'type' => 'required|string|max:255',
            'fuel_type' => 'nullable|string|max:50',
            'is_suv' => 'nullable|boolean',
            'is_electric' => 'nullable|boolean',
            'role' => 'required|string|max:50',
        ]);

        ParkingLot::create([
            'customer_id' => $validated['customer_id'],
            'plate' => $validated['plate'],
            'make' => $validated['make'],
            'model' => $validated['model'],
            'year' => $validated['year'],
            'type' => $validated['type'],
            'fuel_type' => $validated['fuel_type'],
            'is_suv' => $request->boolean('is_suv'),
            'is_electric' => $request->boolean('is_electric'),
            'role' => $validated['role'],
        ]);

        return back()->with('success', 'Aracınız başarı ile eklendi.');
    }
}
