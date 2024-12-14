<?php

namespace Database\Seeders\Vehicle\Car;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MakesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://www.carqueryapi.com/api/0.3/', [
            'cmd' => 'getMakes',
        ]);

        if ($response->successful()) {
            // Gelen yanıtın JSON içeriğini doğru biçimde al
            $makes = $response->json()['Makes'] ?? [];

            foreach ($makes as $make) {
                DB::table('makes')->updateOrInsert(
                    [
                        'id' => $make['make_id'], // Primary Key
                    ],
                    [
                        'name' => $make['make_display'], // Görünen ad
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        } else {
            $this->command->error('Makes API çağrısı başarısız oldu!');
        }
    }
}
