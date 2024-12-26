<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ParkingLotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parking_lots')->insert([
            [
                'vendor_id' => '1',
                'name' => 'Otopark A',
                'description' => 'İstanbulun En lüks Otoparkı',
                'location' => 'İstanbul/Beşiktaş Stadyumu',
                'city_id'=>1,
                'district_id'=>1,
                'town_id'=>1,
                'neighbourhood_id'=>1,
                'capacity' => 100,
                'available_capacity' => 50,
                'is_open' => true,
                'type' => 'indoor',
                'has_valet_service' => true,
                'has_cleaning_service' => true,
                'has_electric_car_charging' => true,
            ],
        ]);
    }
}
