<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Transaksi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User / Admin seeder
        User::create([
            'nama_petugas' => 'Rian Muhammad Afriansyah',
            'email' => 'rianma1333@gmail.com',
            'username' => 'Rian',
            'password' => bcrypt('password'),
            'level' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Siswa Seeder
        Siswa::factory(20)->create();

        // Petugas Seeder
        User::factory(10)->create();

        // Kelas Seeder
        $this->call(KelasSeeder::class);

        // SPP Seeder
        $this->call(SppSeeder::class);

        // Transaksi Seeder
        Transaksi::factory(10)->create();
    }
}
