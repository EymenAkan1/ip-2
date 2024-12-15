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
                'longitude' => 28.9784,
                'latitude' => 41.0082,
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
