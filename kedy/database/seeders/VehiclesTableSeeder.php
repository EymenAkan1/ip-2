<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            [
                'user_id' => 5,
                'plate' => '34 ABC 123',
                'make_id' => 1,
                'model_id' => 1,
                'year' => 2020,
                'color' => 'black',
                'type' => 'car',
                'fuel_type' => 'petrol',
                'is_suv' => false,
                'is_electric' => false,
                'role' => 'owner',
            ],
        ]);
    }
}
