@extends('cetak.cetak-data')
@section('conten')
<tr>
    <th>Petugas</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Tanggal bayar</th>
    <th>Bulan dibayar</th>
    <th>Jumlah bayar</th>
    <th>Status</th>
</tr>
    
@foreach ($transaksis as $transaksi)
<tr>
    <td>{{ $transaksi->petugas->nama_petugas }}</td>
    <td>{{ $transaksi->siswa->nama }}</td>
    <td>{{ $transaksi->siswa->kelas->nama_kelas }}</td>
    <td>{{ $transaksi->tgl_bayar }}</td>
    <td>{{ $transaksi->bulan_dibayar }}</td>
    <td>Rp.{{ number_format($transaksi->jumlah_bayar) }}</td>
    <td>
    @if ($transaksi->spp->nominal == $transaksi->jumlah_bayar)
         <p class="text-success">LUNAS</p>
     @else
         <p class="text-danger">BELUM LUNAS</p>
    @endif
    </td>
</tr>
@endforeach
@endsection