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
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(TownSeeder::class);
        $this->call(NeighbourhoodSeeder::class);
        $this->call(CarMakeSeeder::class);
        $this->call(CarModelSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(ParkingLotTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
        $this->call(WorkerLogsTableSeeder::class);
    }
}
