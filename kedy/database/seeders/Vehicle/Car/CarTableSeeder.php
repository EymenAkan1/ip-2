<?php

namespace Database\Seeders\Vehicle\Car;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MakesTableSeeder::class,
            ModelsTableSeeder::class,
        ]);
    }
}
