@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data SPP</h1>
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
              <a href="{{ asset('') }}spp/create" class="btn float-left tombol-tambah mt-2">Tambah SPP</a>
              <a href="{{ asset('') }}cetak-spp" target="blank_" class="btn ml-2 float-left tombol-tambah mt-2">Cetak SPP</a>

                  <form class="input-group input-group-sm col-lg-5 mr-2 mt-2 float-right" action="/spp" method="get">
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
                    <th>Tahun</th>
                    <th>Nominal</th>
                    <th>Kelas</th>
                    <th class="text-right">aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($spps as $spp)
                    <tr>
                      <td>{{ $spp->tahun }}</td>
                      <td>Rp.{{ number_format($spp->nominal) }}</td>
                      <td>{{ $spp->kelas->nama_kelas }}</td>
                      <td class="d-flex justify-content-end">
                        <a class="nav-link text-dark btn bg-hitam tombol-tambah p-2" data-toggle="dropdown" href="#" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                            <a href="{{ asset('') }}spp/edit/{{ $spp->id }}" class="dropdown-item">
                                Edit
                            </a>
                            <a href="{{ asset('') }}spp/hapus/{{ $spp->id }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
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
              {{ $spps->links() }}
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