<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Town;
use App\Models\Neighbourhood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citiesFile = Storage::get('geo.json');
        $cities = json_decode($citiesFile);

        foreach ($cities as $c) {
            $city = new City();
            $city->name = $c->Province;
            $city->plate = $c->PlateNumber;
            $city->save();

            foreach ($c->Districts as $d) {
                $district = new District();
                $district->name = $d->District;
                $district->city_id = $city->id;
                $district->save();

                foreach ($d->Towns as $t) {
                    $town = new Town();
                    $town->name = $t->Town;
                    $town->district_id = $district->id;
                    $town->save();

                    foreach ($t->Neighbourhoods as $n) {
                        $neighbourhood = new Neighbourhood();
                        $neighbourhood->name = $n;
                        $neighbourhood->town_id = $town->id;
                        $neighbourhood->save();

                    }
                }
            }
        }
    }
}
