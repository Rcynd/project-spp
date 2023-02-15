<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Spp;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return view('data-siswa',[
            'siswas' => Siswa::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
            'kelass' => Kelas::all(),
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
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:11,13',
        ]);
        Siswa::create($validateData);
        User::create([
            'nama_petugas' => $validateData['nama'],
            'username' => $validateData['nis'],
            'password' => bcrypt('password'),
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
        ]);
        Siswa::where('nisn',$nisn)->update($validateData);
        User::where('username',request()->nis)->update([
            'nama_petugas' => $validateData['nama'],
            'username' => $validateData['nis'],
            'password' => bcrypt('password'),
            'level' => 'siswa'
        ]);
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diUbah!');
    }
    public function destroy($nis){
        Siswa::where('nis',$nis)->delete();
        User::where('username',$nis)->delete();
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diHapus!');
    }
}
