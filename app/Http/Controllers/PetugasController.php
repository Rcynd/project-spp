<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(){
        return view('data-petugas',[
            'petugass' => User::where('level','petugas')->orderBy('id','desc')->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
    public function cetakPetugas(){
        return view('cetak.data-petugas',[
            'petugass' => User::where('level', 'petugas')->get()
        ]);
    }
    public function create(){
        return view('data-petugas-create',[
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nama_petugas' => 'required|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|same:ulangi_password',
        ]);
        $validateData['password'] = bcrypt($request->password);
        $validateData['level'] = 'petugas';
        $validateData['email_verified_at'] = now();
        User::create($validateData);
        return redirect('/petugas')->with('sukses','Data Petugas berhasil diTambahkan!');
    }
    public function edit($id){
        $dataPetugas = User::where('id',$id)->first();
        return view('data-petugas-edit',[
            'id' => $id,
            'petugas' => $dataPetugas
        ]);
    }
    public function update(Request $request, $id){
        $petugas = User::where('id',$id)->first();
        $validateData = $request->validate([
            'nama_petugas' => 'required|max:255',
            'username' => 'required',
            'email' => 'required',
            'password' => 'same:ulangi_password'
        ]);
        if (isset($validateData['password'])) {
            $validateData['password'] = bcrypt( $validateData['password']);
            User::where('id',$id)->update($validateData);
            return redirect('/petugas')->with('sukses','Data Petugas berhasil diUbah beserta Password!');
        }
        
        User::where('id',$id)->update([
            'nama_petugas' => $validateData['nama_petugas'],
            'username' => $validateData['username'],
            'email' => $validateData['email']
            ]
        );
        return redirect('/petugas')->with('sukses','Data Petugas berhasil diUbah!');
    }
    public function destroy($id){
        User::where('id',$id)->where('level','petugas')->delete();
        return redirect('/petugas')->with('sukses','Data Petugas berhasil diHapus!');
    }
}
