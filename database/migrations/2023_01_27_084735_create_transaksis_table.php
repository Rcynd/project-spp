<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_petugas',11);
            $table->foreignId('id_siswa',10);
            $table->foreignId('id_kelas',10)->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->string('bulan_dibayar',11)->nullable();
            $table->string('tahun_dibayar',4)->nullable();
            $table->foreignId('id_spp',11)->nullable();
            $table->integer('jumlah_bayar')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
