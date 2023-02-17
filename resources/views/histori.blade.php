@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data History</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  @if (session()->has('sukses'))
  <div class="card bg-success m-3">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card glass-card">
            <div class="card-header">
              @if (Auth()->user()->level != 'siswa')
              <form class="input-group input-group-sm col-lg-12 mr-2 mt-2 float-right" action="/histori" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="cari berdasarkan NISN atau NIS" name="searcha" autofocus>
                    <button class="btn btn-default" type="submit" ><i class="fas fa-search"></i></button>
                </div>
              </form>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              @if (isset($siswa))
              <div class=" col-lg-6">
                <div class="card-body d-flex justify-content-between">
                  <div class="">
                    <p class="card-text">NISN</p>
                    <p class="card-text">NIS</p>
                    <p class="card-text">Nama</p>
                    <p class="card-text">Kelas</p>
                  </div>
                  <div class="">
                    <p class="card-text">: {{ $siswa->nisn }}</p>
                    <p class="card-text">: {{ $siswa->nis }}</p>
                    <p class="card-text">: {{ $siswa->nama }}</p>
                    <p class="card-text">: {{ $siswa->kelas->nama_kelas }} | {{ $siswa->kelas->kompetensi_keahlian }} </p>
                  </div>
                </div>
              </div>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Petugas</th>
                    <th>Siswa</th>
                    <th>Tanggal bayar</th>
                    <th>Tahun/Nominal</th>
                    <th>Jumlah bayar</th>
                    <th>bulan dibayar</th>
                    <th>Status</th>
                    @can('petugas')
                    <th>aksi</th>
                    @endcan
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    <tr>
                      <td>{{ $transaksi->petugas->nama_petugas }}</td>
                      <td>{{ $transaksi->siswa->nama }}</td>
                      <td>{{ $transaksi->tgl_bayar }}</td>
                      <td>{{ $transaksi->spp->tahun }} | Rp{{number_format( $transaksi->spp->nominal) }}</td>
                      <td>Rp.{{ number_format($transaksi->jumlah_bayar) }}</td>
                      <td>{{$transaksi->bulan_dibayar }}</td>
                      <td>
                        @if ($transaksi->spp->nominal == $transaksi->jumlah_bayar)
                            <p class="text-success">LUNAS</p>
                        @else
                            <p class="text-danger">BELUM LUNAS</p>
                        @endif
                      </td>
                      @can('petugas')
                      <td class="d-flex justify-content-end">
                        <a class="nav-link text-dark btn bg-hitam tombol-tambah p-2" data-toggle="dropdown" href="#" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                          @if ($transaksi->spp->nominal == $transaksi->jumlah_bayar)
                          <form class="m-0 p-0" method="post" action="/histori/resets/{{ $transaksi->id }},{{ $transaksi->siswa->id }}" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_petugas" value="{{ Auth()->user()->id }}">
                            <input type="hidden" name="id_spp" value="{{ $transaksi->spp->id }}">
                            <button type="submit" class="dropdown-item" onclick="return confirm(' Reset Data? \n Data yang Reset tidak bisa dikembalikan!')">reset</button>
                          </form>
                          @else
                          @endif
                          @if ($transaksi->jumlah_bayar == 0)
                          <a href="{{ asset('') }}histori/lunass/{{ $transaksi->id }},{{ $transaksi->siswa->id }}" class="dropdown-item">
                              Bayar Lunas
                          </a>
                          @endif
                            <a href="{{ asset('') }}histori/hapuss/{{ $transaksi->id }},{{ $transaksi->siswa->id }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
                                Hapus
                            </a>
                        </div>
                      </td>
                      @endcan
                    </tr>
                    @endforeach
                </tbody>
              </table>
              @else
              @if (session()->has('notfound'))
              <div class="card bg-success m-3">
                <div class="text-light d-flex justify-content-center align-items-center">
                  <p class="p-0 m-2">{{ session('notfound') }}</p>
                </div>
              </div>
              @endif

              @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection