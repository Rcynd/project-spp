@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>Nama Kelas</th>
    <th>Kompetensi Keahlian</th>
</tr>
    
@foreach ($kelass as $kelas)
<tr>
    <td>{{ $kelas->nama_kelas }}</td>
    <td>{{ $kelas->kompetensi_keahlian }}</td>
</tr>
@endforeach
@endsection