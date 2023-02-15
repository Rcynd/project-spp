<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->whereHas('siswa', function($query) use ($search){
                $query->where('nama','like','%' . $search . '%')
                ->orWhere('nisn',$search)
                ->orWhere('nis',$search)
                ;
            })->orWhere('tahun_dibayar','like','%' . $search . '%')
            ->orWhere('bulan_dibayar','like','%' . $search . '%')
            ;
        });
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    public function petugas(){
        return $this->belongsTo(User::class, 'id_petugas');
    }
    public function spp(){
        return $this->belongsTo(Spp::class, 'id_spp');
    }
    public function kelas(){
        return $this->belongsTo(Spp::class, 'id_kelas');
    }
}
