<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=1; $i <= 4 ; $i++) { 
        //     Transaksi::create([
        //         'id_petugas' => mt_rand(1,6),
        //         'id_siswa' => mt_rand(1,6),
        //         'tgl_bayar' => fake()->date('2023-m-d'),
        //         'bulan_dibayar' => fake()->monthName(),
        //         'tahun_dibayar' => fake()->year(),
        //         'id_spp' => mt_rand(1,4),
        //         'jumlah_bayar' => 400000,
        //     ]);
        // }
    }
}
