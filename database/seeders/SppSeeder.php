<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spp;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2023; $i <=2025 ; $i++) { 
            $b = $i+1;
            $c = " - " .$b;
            Spp::create([
                'tahun' => $i,
                'nominal' => fake()->unique()->numerify('##0000'),
            ]);
        }
    }
}
