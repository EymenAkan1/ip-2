<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AuditLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('audit_logs')->insert([
            [
                'customer_id' => 1,
                'action' => 'Reservation Created',
                'table_name' => 'reservations',
                'changes' => null,
                'occurred_at' => now(),
            ],
        ]);

    }
}
