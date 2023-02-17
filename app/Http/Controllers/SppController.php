<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\Kelas;

class SppController extends Controller
{
    public function index(){
        return view('data-spp',[
            'spps' => Spp::orderBy('tahun','asc')->filter(request(['search']))->paginate(8)->withQueryString(),
        ]);
    }
    public function cetakSpp(){
        return view('cetak.data-spp',[
            'spps' => Spp::get()
        ]);
    }
    public function create(){
        return view('data-spp-create',[
            'kelass' => Kelas::get(),
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'tahun' => 'required|unique:spps',
            'nominal' => 'required|numeric',
        ]);
        Spp::create($validateData);
        return redirect('/spp')->with('sukses','Data SPP berhasil diTambahkan!');
    }
    public function edit($id){
        $dataSpp = Spp::where('id',$id)->first();
        return view('data-spp-edit',[
            'id' => $id,
            'spp' => $dataSpp
        ]);
    }
    public function update(Request $request, $id){
        $validateData = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required|numeric',
        ]);
        Spp::where('id',$id)->update($validateData);
        return redirect('/spp')->with('sukses','Data SPP berhasil diUbah!');
    }
    public function destroy($id){
        Spp::where('id',$id)->delete();
        return redirect('/spp')->with('sukses','Data SPP berhasil diHapus!');
    }
}
