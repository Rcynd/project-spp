@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>Nama Petugas</th>
    <th>Username</th>
</tr>
    
@foreach ($petugass as $petugas)
<tr>
    <td>{{ $petugas->nama_petugas }}</td>
    <td>{{ $petugas->username }}</td>
</tr>
@endforeach
@endsection