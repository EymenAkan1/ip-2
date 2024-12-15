<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'customer_id' => 1,
                'vendor_id' => 1,
                'parking_lot_id' => 1,
                'vehicle_id' => 1,
                'worker_id' => 1,
                'reservation_start_time' => now(),
                'reservation_end_time' => now()->addHours(2),
                'duration_type' => 'hour',
                'reservation_status' => 'confirmed',
                'price' => 100,
            ],
        ]);
    }
}
