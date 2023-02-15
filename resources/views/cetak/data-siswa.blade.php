@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>NISN</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>alamat</th>
    <th>no_telp</th>
</tr>
    
@foreach ($siswas as $siswa)
<tr>
    <td>{{ $siswa->nisn }}</td>
    <td>{{ $siswa->nis }}</td>
    <td>{{ $siswa->nama }}</td>
    <td>{{ $siswa->spp->kelas->nama_kelas }}</td>
    <td>{{ $siswa->alamat }}</td>
    <td>{{ $siswa->no_telp }}</td>
</tr>
@endforeach
@endsection