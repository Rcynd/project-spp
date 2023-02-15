<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nisn' => fake()->unique()->numerify('00100200##'),
            'nis' => fake()->unique()->numerify('202301##'),
            'nama' => fake()->unique()->firstName(),
            'id_kelas' => mt_rand(1,5),
            'alamat' => fake()->address(),
            'no_telp' =>fake()->numerify('08###########'),
            'id_spp' => mt_rand(1,3),
        ];
    }
}
