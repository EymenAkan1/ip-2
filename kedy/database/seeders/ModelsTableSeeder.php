<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model;
use DB;

class ModelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('models')->insert([
            [
                'make_id' => 1,
                'name' => 'S500',
                'year' => 2022
            ],
            [
                'make_id' => 2,
                'name' => 'R8',
                'year' => 2015
            ],
        ]);
    }
}
