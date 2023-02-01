<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_petugas' => mt_rand(1,6),
            'id_siswa' => mt_rand(1,6),
            'tgl_bayar' => fake()->date('2023-0m-d'),
            // 'bulan_dibayar' => fake()->monthName(),
            // 'tahun_dibayar' => fake()->year(),
            'id_spp' => mt_rand(1,4),
            // 'jumlah_dibayar' => 400000,
        ];
    }
}
