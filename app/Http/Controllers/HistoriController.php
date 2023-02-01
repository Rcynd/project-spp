<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Siswa;

class HistoriController extends Controller
{
    public function index(){
        return view('histori',[
        ]);
    }
    public function cari(Request $request){
        if (sizeof(Siswa::where('nisn',$request->searcha)->orWhere('nis',$request->searcha)->get())) {
            $idSiswa = Siswa::where('nisn',$request->searcha)->orWhere('nis',$request->searcha)->first();
            return view('histori',[
                'transaksis' => Transaksi::where('id_siswa',$idSiswa->id)->get(),
                'siswa' => Siswa::where('nisn',$idSiswa->nisn)->orWhere('nis',$idSiswa->nis)->first()
            ]);
        }
        return back()->with('notfound','NIS atau NISN tidak ditemukan!');
    }
}
