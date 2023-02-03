<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Kelas;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return view('data-siswa',[
            'siswas' => Siswa::orderBy('nisn','asc')->filter(request(['search']))->paginate(8)->withQueryString(),
            'kelass' => Kelas::all(),
        ]);
    }
    public function create(){
        return view('data-siswa-create',[
            'kelass' => Kelas::all(),
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nisn' => 'required|unique:siswas|numeric|digits:10',
            'nis' => 'required|unique:siswas|numeric|digits:8',
            'nama' => 'required|max:255',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:11,13',
            'id_spp' => 'required',
        ]);
        Siswa::create($validateData);
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diTambahkan!');
    }
    public function edit($nisn){
        $dataSiswa = Siswa::where('nisn',$nisn)->first();
        return view('data-siswa-edit',[
            'nisn' => $nisn,
            'siswa' => $dataSiswa,
            'kelass' => Kelas::all(),
        ]);
    }
    public function update(Request $request, $nisn){
        $validateData = $request->validate([
            'nisn' => 'required|numeric|digits_between:1,10',
            'nis' => 'required|numeric|digits_between:1,8',
            'nama' => 'required|max:255',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:1,13',
            'id_spp' => 'required',
        ]);
        Siswa::where('nisn',$nisn)->update($validateData);
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diUbah!');
    }
    public function destroy($nisn){
        Siswa::where('nisn',$nisn)->delete();
        return redirect('/siswa')->with('sukses','Data Siswa berhasil diHapus!');
    }
}
