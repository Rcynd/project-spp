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
            'transaksis' => Transaksi::latest()->filter(request(['search']))->paginate(12)->withQueryString(),
            'siswass' => Siswa::orderBy('nama','asc')->get(),
        ]);
    }
    public function cetakTransaksi(Request $request){
        $siswa = $request->id_siswa;
        return view('cetak.data-transaksi',[
            'transaksis' => Transaksi::where('id_siswa',$siswa)->get(),
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
        $siswa=explode(",", request()->id_siswa);
        $nominals = Spp::where('id', $siswa[1])->first();
        $transaksi = Transaksi::where('id_siswa' , $siswa[0])->first();
        $validateData = $request->validate([
            'id_petugas' => '',
            'id_siswa' => '',
            'tgl_bayar' => '',
            'id_spp' => '',
            'id_kelas' => '',
            'bulan_dibayar' => 'required',
            'jumlah_bayar' => '',
        ]);
        $validateData['id_siswa'] = $siswa[0];
        $validateData['id_spp'] = $siswa[1];
        $validateData['id_kelas'] = $siswa[2];
        $validateData['jumlah_bayar'] = $nominals->nominal;
        $validateData['tgl_bayar'] = now();
        // dd($transaksi->id_spp);
        if($transaksi == null){
            Transaksi::create($validateData);
            return redirect('/transaksi')->with('sukses','Data Siswa berhasil diTambahkan s!');
        } elseif($transaksi->id_spp != request()->id_spp) {
            Transaksi::create($validateData);
            return redirect('/transaksi')->with('sukses','Data Siswa berhasil diTambahkan!');
        }else{
            return back()->with('sukses','Data siswa sudah ada');

        }
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
            'jumlah_bayar' => 'numeric',
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
    public function bayarLunas(Request $request, $id){
        $bayar = Transaksi::where('id',$id)->first();
        Transaksi::where('id',$id)->update([
            'jumlah_bayar' => $bayar->spp->nominal,
            'tgl_bayar' => now(),
            'id_spp' => $bayar->spp->id,
            'id_petugas' => auth()->user()->id,
        ]);
        return redirect('/transaksi')->with('sukses','Transaksi berhasil diBayar!');
    }
    public function bayarLunass(Request $request, $id){
        $siswa = explode(',',$id);
        $bayar = Transaksi::where('id',$siswa[0])->first();
        $dataSiswa = Siswa::where('id',$siswa[1])->first();
        Transaksi::where('id',$siswa[0])->update([
            'jumlah_bayar' => $bayar->spp->nominal,
            'tgl_bayar' => now(),
            'id_spp' => $bayar->spp->id,
            'id_petugas' => auth()->user()->id,
        ]);
        return view('histori',[
            'transaksis' => Transaksi::where('id_siswa',$siswa[1])->get(),
            'siswa' => $dataSiswa,
        ])->with('sukses','Transaksi berhasil diBayar!');
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
    public function resets(Request $request, $id){
        $siswa = explode(',',$id);
        $nominals = Spp::where('id', request()->id_spp)->first();
        $dataSiswa = Siswa::where('id',$siswa[1])->first();
        $validateData = $request->validate([
            'id_petugas' => 'required',
            'id_spp' => 'required',
        ]);
        Transaksi::where('id',$siswa[0])->update([
            'jumlah_bayar' => 0,
            'id_spp' => $validateData['id_spp'],
            'id_petugas' => $validateData['id_petugas'],
        ]);
        return view('histori',[
            'transaksis' => Transaksi::where('id_siswa',$siswa[1])->get(),
            'siswa' => $dataSiswa,
        ])->with('sukses','Transaksi berhasil diReset!');
    }
    public function destroy($id){
        Transaksi::where('id',$id)->delete();
        return redirect('/transaksi')->with('sukses','Data Transaksi berhasil diHapus!');
    }
    public function destroys($id){
        $siswa = explode(',',$id);
        $dataSiswa = Siswa::where('id',$siswa[1])->first();
        Transaksi::where('id',$siswa[0])->delete();
        return view('histori',[
            'transaksis' => Transaksi::where('id_siswa',$siswa[1])->get(),
            'siswa' => $dataSiswa,
        ])->with('sukses','Data Transaksi berhasil diHapus!');
    }
}
