<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=1; $i <= 4 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "X RPL $i",
        //         'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        //     ]);
        // }
        // for ($i=1; $i <= 3 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "X ANM $i",
        //         'kompetensi_keahlian' => 'Animasi',
        //     ]);
        // }
        // for ($i=1; $i <= 3 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "X DKV $i",
        //         'kompetensi_keahlian' => 'Desain Komunikasi Visual',
        //     ]);
        // }
        // for ($i=1; $i <= 2 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "X BDP $i",
        //         'kompetensi_keahlian' => 'Pemasaran',
        //     ]);
        // }
        // for ($i=1; $i <= 3 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "X AKT $i",
        //         'kompetensi_keahlian' => 'Akuntansi',
        //     ]);
        // }
        // for ($i=1; $i <= 4 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "XI RPL $i",
        //         'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        //     ]);
        // }
        // for ($i=1; $i <= 3 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "XI ANM $i",
        //         'kompetensi_keahlian' => 'Animasi',
        //     ]);
        // }
        // for ($i=1; $i <= 3 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "XI DKV $i",
        //         'kompetensi_keahlian' => 'Desain Komunikasi Visual',
        //     ]);
        // }
        // for ($i=1; $i <= 2 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "XI BDP $i",
        //         'kompetensi_keahlian' => 'Pemasaran',
        //     ]);
        // }
        // for ($i=1; $i <= 3 ; $i++) { 
        //     Kelas::create([
        //         'nama_kelas' => "XI AKT $i",
        //         'kompetensi_keahlian' => 'Akuntansi',
        //     ]);
        // }
        for ($i=1; $i <= 4 ; $i++) { 
            Kelas::create([
                'nama_kelas' => "XII RPL $i",
                'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Kelas::create([
                'nama_kelas' => "XII ANM $i",
                'kompetensi_keahlian' => 'Animasi',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Kelas::create([
                'nama_kelas' => "XII DKV $i",
                'kompetensi_keahlian' => 'Desain Komunikasi Visual',
            ]);
        }
        for ($i=1; $i <= 2 ; $i++) { 
            Kelas::create([
                'nama_kelas' => "XII BDP $i",
                'kompetensi_keahlian' => 'Pemasaran',
            ]);
        }
        for ($i=1; $i <= 3 ; $i++) { 
            Kelas::create([
                'nama_kelas' => "XII AKT $i",
                'kompetensi_keahlian' => 'Akuntansi',
            ]);
        }
    }
}
