@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>Tahun</th>
    <th>Nominal</th>
</tr>
    
@foreach ($spps as $spp)
<tr>
    <td>{{ $spp->tahun }}</td>
    <td>Rp.{{ number_format($spp->nominal) }}</td>
</tr>
@endforeach
@endsection