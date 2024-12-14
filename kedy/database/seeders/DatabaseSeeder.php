<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Users\UserTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Vehicle\Car\CarTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //SIRALAMA BURADA YAPILACAK php artisan migrate:fresh --seed tabloları oluştur ve seedle \ php artisan db:seed direkt olarak seed çalıştır


        $this->call([UserTableSeeder::class]);//En üstte olacak bu arkadaş


        //$this->call([CarTableSeeder::class]);

    }
}
