<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spp extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('tahun','like', '%' . $search . '%')
            ->orWhere('nominal','like', '%' . $search . '%')
            ;
        });
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class ,'id_kelas');
    }
}
