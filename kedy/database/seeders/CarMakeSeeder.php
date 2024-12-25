<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\CarMake;
use App\Models\CarModel;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carsFile = Storage::get('car.json');
        $cars = json_decode($carsFile);

        foreach ($cars as $c1) {
            $car = new CarMake();
            $car->make = $c1->brand;
            $car->save();

            foreach ($c1->models as $c2) {
                $models = new CarModel();
                $models->model_name = $c2;
                $models->make_id = $car->id;
                $models->save();
            }
        }
    }
}
