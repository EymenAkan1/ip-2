<?php

namespace Database\Seeders\Users;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1'),
                'role' => 'admin',
                'parent_id' => null,
                'is_verified' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'staff',
                'email' => 'staff@staff.com',
                'password' => bcrypt('2'),
                'role' => 'staff',
                'parent_id' => 1, // Admine bağlı olacak
                'is_verified' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'staff1',
                'email' => 'staff@staff.com',
                'password' => bcrypt('3'),
                'role' => 'staff',
                'parent_id' => 1, // Admine bağlı olacak
                'is_verified' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'vendor',
                'email' => 'vendor@vendor.com',
                'password' => bcrypt('4'),
                'role' => 'vendor',
                'parent_id' => null, // Vendor bağımsız
                'is_verified' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'valet',
                'email' => 'valet@valet.com',
                'password' => bcrypt('5'),
                'role' => 'valet',
                'parent_id' => 3, // Vendor ID olacak
                'is_verified' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'cleaner',
                'email' => 'cleaner@cleaner.com',
                'password' => bcrypt('6'),
                'role' => 'cleaner',
                'parent_id' => 3, // Vendor ID olacak
                'is_verified' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'customer',
                'email' => 'customer@customer.com',
                'password' => bcrypt('7'),
                'role' => 'customer',
                'parent_id' => null, // Customer bağımsız
                'is_verified' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
