<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //SIRALAMA BURADA YAPILACAK php artisan migrate:fresh --seed tabloları oluştur ve seedle \ php artisan db:seed direkt olarak seed çalıştır
        $this->call(UsersTableSeeder::class);
        //       $this->call(MakesTableSeeder::class);
        //       $this->call(ModelsTableSeeder::class);
        //       $this->call(VehiclesTableSeeder::class);

    }
}
