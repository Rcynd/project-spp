<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama','like','%'. $search .'%')
            ->orWhere('nisn','like',$search . '%')
            ->orWhere('nis','like',$search . '%')
            ->orWhere('alamat','like','%'. $search .'%')
            ->orWhere('no_telp','like',$search . '%')
            ;
        });
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
