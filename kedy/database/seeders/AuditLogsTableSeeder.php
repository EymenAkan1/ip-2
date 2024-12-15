<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuditLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AuditLog::create([
            'user_id' => 3,
            'action' => 'Reservation Created',
            'details' => 'Kullanıcı 34 ABC 123 plakalı araç için rezervasyon oluşturdu.',
        ]);

    }
}
