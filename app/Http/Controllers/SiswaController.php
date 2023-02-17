<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return view('data-siswa',[
            'siswas' => Siswa::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
            'kelass' => Kelas::all(),
        ]);
    }
    public function cetakSiswa(){
        return view('cetak.data-siswa',[
            'siswas' => Siswa::get(),
            'kelass' => Kelas::get(),
        ]);
    }
    public function create(){
        return view('data-siswa-create',[
            'kelass' => Kelas::all(),
            'spps' => Spp::all(),
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nisn' => 'required|unique:siswas|numeric|digits:10',
            'nis' => 'required|unique:siswas|numeric|digits:8',
            'nama' => 'required|max:255',
            'id_spp' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:11,13',
        ]);
        // $nominals = Spp::where('id', $validateData['id_spp'])->first();
        // $id_now = Siswa::orderBy('id','desc')->first();
        // $bulan = array("januari", "februari", "maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
        // if(!isset($id_now->id)){
        //     for ($i=0; $i <12 ; $i++) { 
        //         Transaksi::create([
        //             'id_petugas' => Auth()->user()->id,
        //             'id_siswa' => 1,
        //             'tgl_bayar' => now(),
        //             'id_spp' => $validateData['id_spp'],
        //             'bulan_dibayar' => $bulan[$i],
        //             'jumlah_bayar' => 0,
        //         ]);
        //     }
        // } else{
        //     for ($i=0; $i <12 ; $i++) { 
        //         Transaksi::create([
        //             'id_petugas' => Auth()->user()->id,
        //             'id_siswa' => $id_now->id + 1,
        //             'tgl_bayar' => now(),
        //             'id_spp' => $validateData['id_spp'],
        //             'bulan_dibayar' => $bulan[$i],
        //             'jumlah_bayar' => 0,
        //         ]);
        //     }
        // }
        Siswa::create($validateData);
        User::create([
            'nama_petugas' => $validateData['nama'],
            'username' => $validateData['nisn'],
            'password' => bcrypt($validateData['nis']),
            'level' => 'siswa'
        ]);
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diTambahkan!');
    }
    public function edit($nisn){
        $dataSiswa = Siswa::where('nisn',$nisn)->first();
        return view('data-siswa-edit',[
            'nisn' => $nisn,
            'siswa' => $dataSiswa,
            'spps' => Spp::all(),
            'kelass' => Kelas::all(),
        ]);
    }
    public function update(Request $request, $nisn){
        $validateData = $request->validate([
            'nisn' => 'required|numeric|digits_between:1,10',
            'nis' => 'required|numeric|digits_between:1,8',
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:1,13',
            'id_spp' => 'required',
            'id_kelas' => 'required',
        ]);
        Siswa::where('nisn',$nisn)->update($validateData);
        User::where('username',request()->nis)->update([
            'nama_petugas' => $validateData['nama'],
            'username' => $validateData['nisn'],
            'password' => bcrypt($validateData['nis']),
            'level' => 'siswa'
        ]);
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diUbah!');
    }
    public function destroy($data){
        $siswa = explode(',',$data);
        Siswa::where('nis',$siswa[0])->delete();
        User::where('username',$siswa[0])->delete();
        // Transaksi::where('id_siswa',$siswa[1])->delete();
        
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diHapus!');
    }
}
