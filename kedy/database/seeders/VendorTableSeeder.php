<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            [
                'user_id' => 3,
                'name' => 'Vendor',
                'contact_number1' => '+90 123 456 78 90',
                'contact_number2' => '+90 123 456 78 91',
                'contact_email' => 'vendor@example.com',
            ],
        ]);
    }
}
