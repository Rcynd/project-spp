<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\User;

class TransaksiController extends Controller
{
    public function index(){
        return view('transaksi',[
            'transaksis' => Transaksi::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
        ]);
    }
    public function create(){
        return view('transaksi-create',[
            'spps' => Spp::all(),
            'siswas' => Siswa::orderBy('nama','asc')->get(),
            'petugass' => USer::orderBy('nama_petugas','asc')->get(),
        ]);
    }
    public function store(Request $request){
        $nominals = Spp::where('id', request()->id_spp)->first();
        $validateData = $request->validate([
            'id_petugas' => 'required|max:255',
            'id_siswa' => 'required|max:255',
            'tgl_bayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => "required|numeric|max:$nominals->nominal",
        ]);
        Transaksi::create($validateData);
        return redirect('/transaksi')->with('sukses','Data Siswa berhasil diTambahkan!');
    }
    public function edit($id){
        $dataTransaksi = Transaksi::where('id',$id)->first();
        return view('transaksi-edit',[
            'transaksi' => $dataTransaksi
        ]);
    }
    public function update(Request $request, $id){
        $nominals = Spp::where('id', request()->id_spp)->first();
        $validateData = $request->validate([
            'id_petugas' => 'required',
            'id_spp' => 'required',
            'jumlah_harus_bayar' => 'required|numeric',
            'jumlah_sudah_bayar' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric',
        ]);
        if ($request->jumlah_sudah_bayar + $request->jumlah_bayar > $request->jumlah_harus_bayar) {
            return back()->with('sukses','Jumlah bayar melebihi angka seharusnya!');
        }
        Transaksi::where('id',$id)->update([
            'jumlah_bayar' => $request->jumlah_sudah_bayar + $request->jumlah_bayar,
            'tgl_bayar' => now(),
            'id_spp' => $validateData['id_spp'],
            'id_petugas' => $validateData['id_petugas'],
        ]);
        return redirect('/transaksi')->with('sukses','Transaksi berhasil diBayar!');
    }
    public function reset(Request $request, $id){
        $nominals = Spp::where('id', request()->id_spp)->first();
        $validateData = $request->validate([
            'id_petugas' => 'required',
            'id_spp' => 'required',
        ]);
        Transaksi::where('id',$id)->update([
            'jumlah_bayar' => 0,
            'id_spp' => $validateData['id_spp'],
            'id_petugas' => $validateData['id_petugas'],
        ]);
        return redirect('/transaksi')->with('sukses','Transaksi berhasil diReset!');
    }
    public function destroy($id){
        Transaksi::where('id',$id)->delete();
        return redirect('/transaksi')->with('sukses','Data Transaksi berhasil diHapus!');
    }
}
