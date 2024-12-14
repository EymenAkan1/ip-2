<?php

namespace Database\Seeders\Vehicle\Car;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makes = DB::table('makes')->pluck('id'); // Make ID'lerini çek

        foreach ($makes as $make) {
            $response = Http::get('https://www.carqueryapi.com/api/0.3/', [
                'cmd' => 'getModels',
                'make' => $make,
            ]);

            if ($response->successful()) {
                $json = json_decode(trim($response->body(), '();'), true);
                $models = $json['Models'] ?? [];

                if (!empty($models)) {
                    $data = [];
                    foreach ($models as $model) {
                        // Model yılını kontrol et, yoksa null olarak ata
                        $modelYear = $model['model_year'] ?? null;

                        // Sadece 1970 ve sonrası modelleri al
                        if ($modelYear === null || $modelYear >= 1970) {
                            $data[] = [
                                'make_id' => $make,
                                'name' => $model['model_name'],
                                'year' => $modelYear,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                    }

                    DB::table('models')->insertOrIgnore($data);
                } else {
                    $this->command->warn("No models found for Make ID - $make");
                }
            } else {
                $this->command->error("Failed API Call: Make ID - $make");
            }
        }
    }
}
