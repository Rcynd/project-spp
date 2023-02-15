@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>Tahun</th>
    <th>Nominal</th>
    <th>Kelas</th>
</tr>
    
@foreach ($spps as $spp)
<tr>
    <td>{{ $spp->Tahun }}</td>
    <td>{{ $spp->Nominal }}</td>
    <td>{{ $spp->kelas->nama_kelas }}</td>
</tr>
@endforeach
@endsection