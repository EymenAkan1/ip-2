<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\City;
use App\Models\ParkingLot;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index()
    {

        $reservations = Reservation::where('customer_id', auth()->id())->get();
        $carMakes = CarMake::orderBy('make', 'asc')->get();
        $carModel = CarModel::orderBy('model_name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();
        $parkingLotTypes = ParkingLot::orderBy('type', 'asc')->get();

        return view('customer.dashboard', compact('reservations', 'carMakes', 'carModel', 'cities', 'parkingLotTypes'));
    }

    public function getCarModels($make_id)
    {
        $getCarmodels = CarModel::where('model_id', $make_id)->get();
        return response()->json($getCarmodels);
    }
}
