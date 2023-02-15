@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Petugas</h1>
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
              <a href="{{ asset('') }}petugas/create" class="btn float-left tombol-tambah mt-2">Tambah Petugas</a>
              <a href="{{ asset('') }}cetak-petugas" target="blank_" class="btn ml-2 tombol-tambah mt-2">Cetak Petugas</a>

                  <form class="input-group input-group-sm col-lg-5 mr-2 mt-2 float-right" action="/petugas" method="get">
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
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th class="text-right">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($petugass as $petugas)
                    <tr>
                      <td>{{ $petugas->nama_petugas }}</td>
                      <td>{{ $petugas->username }}</td>
                      <td class="d-flex justify-content-end">
                        <a class="nav-link text-dark btn bg-hitam tombol-tambah p-2" data-toggle="dropdown" href="#" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                            <a href="{{ asset('') }}petugas/edit/{{ $petugas->id }}" class="dropdown-item">
                                Edit
                            </a>
                            <a href="{{ asset('') }}petugas/hapus/{{ $petugas->id }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
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
              {{ $petugass->links() }}
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