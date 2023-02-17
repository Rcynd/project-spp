@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Transaksi</h1>
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
              <a href="{{ asset('') }}transaksi/create" class="btn float-left tombol-tambah mt-2">Tambah Transaksi</a>
              @can('admin')
              <p class="btn float-left ml-2 tombol-tambah mt-2" data-toggle="modal" data-target="#modal-lg">Cetak Transaksi</p>
              @endcan

                  <form class="input-group input-group-sm col-lg-5 mr-2 mt-2 float-right" action="/transaksi" method="get">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="">
                        <button class="btn btn-default" type="submit" ><i class="fas fa-search"></i></button>
                    </div>
                  </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Petugas</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Tanggal bayar</th>
                    <th>Tahun/Nominal</th>
                    <th>Jumlah bayar</th>
                    <th>bulan dibayar</th>
                    <th>Status</th>
                    <th class="text-right">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    <tr>
                      <td>{{ $transaksi->petugas->nama_petugas }}</td>
                      <td>{{ $transaksi->siswa->nama }}</td>
                      <td>{{ $transaksi->siswa->kelas->nama_kelas }}</td>
                      <td>{{ $transaksi->tgl_bayar }}</td>
                      <td>{{ $transaksi->spp->tahun }} | Rp{{number_format( $transaksi->spp->nominal) }}</td>
                      <td>Rp{{ number_format($transaksi->jumlah_bayar) }}</td>
                      <td>{{ $transaksi->bulan_dibayar }}</td>
                      <td>
                        @if ($transaksi->spp->nominal == $transaksi->jumlah_bayar)
                            <p class="text-success">LUNAS</p>
                        @else
                            <p class="text-danger">BELUM LUNAS</p>
                        @endif
                      </td>
                      <td class="d-flex justify-content-end">
                        <a class="nav-link text-dark btn bg-hitam tombol-tambah p-2" data-toggle="dropdown" href="#" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                          @if ($transaksi->spp->nominal == $transaksi->jumlah_bayar)
                          <form class="m-0 p-0" method="post" action="/transaksi/reset/{{ $transaksi->id }}" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_petugas" value="{{ Auth()->user()->id }}">
                            <input type="hidden" name="id_spp" value="{{ $transaksi->spp->id }}">
                            <button type="submit" class="dropdown-item" onclick="return confirm(' Reset Data? \n Data yang Reset tidak bisa dikembalikan!')">reset</button>
                          </form>
                          @else
                            {{-- <a href="{{ asset('') }}transaksi/edit/{{ $transaksi->id }}" class="dropdown-item">
                              Bayar
                            </a> --}}
                          @endif
                          @if ($transaksi->jumlah_bayar == 0)
                          <a href="{{ asset('') }}transaksi/lunas/{{ $transaksi->id }}" class="dropdown-item">
                              Bayar Lunas
                          </a>
                          @endif
                            <a href="{{ asset('') }}transaksi/hapus/{{ $transaksi->id }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
                                Hapus
                            </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-end mr-5 mt-2">
              {{ $transaksis->links() }}
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
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cetak data Siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/cetak-transaksi" class="" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="id_siswa">Nama Siswa</label>
              @error('id_siswa')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <select class="form-control"name="id_siswa">
                @foreach ($siswass as $siswa)
                @if (old('id_siswa') == $siswa->id)
                <option value="{{ $siswa->id }}" selected>{{ $siswa->nama}}</option>
                @else
                <option value="{{ $siswa->id }}">{{ $siswa->nama}}</option>
                @endif
                @endforeach
              </select>
            </div>
          <!-- /.card-body -->

          <div class="">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
