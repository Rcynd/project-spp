<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(){
        return view('data-kelas',[
            'kelass' => Kelas::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
        // 
        // orderBy('kompetensi_keahlian','asc')
    }
    public function create(){
        return view('data-kelas-create',[
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nama_kelas' => 'required|max:255',
            'kompetensi_keahlian' => 'required',
        ]);
        Kelas::create($validateData);
        return redirect('/kelas')->with('sukses','Data Kelas berhasil diTambahkan!');
    }
    public function edit($id){
        $dataKelas = Kelas::where('id',$id)->first();
        return view('data-kelas-edit',[
            'id' => $id,
            'kelas' => $dataKelas
        ]);
    }
    public function update(Request $request, $id){
        $validateData = $request->validate([
            'nama_kelas' => 'required|max:255',
            'kompetensi_keahlian' => 'required',
        ]);
        Kelas::where('id',$id)->update($validateData);
        return redirect('/kelas')->with('sukses','Data Kelas berhasil diUbah!');
    }
    public function destroy($id){
        Kelas::where('id',$id)->delete();
        return redirect('/kelas')->with('sukses','Data Kelas berhasil diHapus!');
    }
}
