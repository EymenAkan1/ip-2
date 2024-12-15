<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('1'),
                'role' => 'admin', // Enum değer
                'parent_id' => null,
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@example.com',
                'password' => bcrypt('2'),
                'role' => 'staff', // Enum değer
                'parent_id' => 1, // Admin kullanıcısı
            ],
            [
                'name' => 'Vendor',
                'email' => 'vendor@example.com',
                'password' => bcrypt('3'),
                'role' => 'vendor',
                'parent_id' => null,
            ],
            [
                'name' => 'Worker',
                'email' => 'worker@example.com',
                'password' => bcrypt('4'),
                'role' => 'worker',
                'parent_id' => 3,
            ],
            [
                'name' => 'customer',
                'email' => 'customer@example.com',
                'password' => bcrypt('5'),
                'role' => 'customer',
                'parent_id' => null,
            ],
        ]);
    }
}
