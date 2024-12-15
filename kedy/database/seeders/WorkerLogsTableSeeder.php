<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class WorkerLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('worker_logs')->insert([
            [
                'reservation_id' => 1,
                'worker_id' => 1,
                'work_type' => 'valet',
                'started_at' => now(),
                'completed_at' => now()->addMinutes(10),
                'completed' => true,
                'vehicle_taken_location' => 'Otopark Önü',
                'vehicle_parked_location' => 'Otopark',
                'incident_reported' => false,
            ],
        ]);
    }
}
