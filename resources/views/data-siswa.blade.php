@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Siswa</h1>
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
          <div class="card">
            <div class="card-header">
              <a href="{{ asset('') }}siswa/create" class="btn btn-primary">Tambah Siswa</a>

                  <form class="input-group input-group-sm col-lg-5 mr-2 mt-2 float-right" action="/siswa" method="get">
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
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>alamat</th>
                    <th>no_telp</th>
                    <th>id_spp</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                    <tr>
                      <td>{{ $siswa->nisn }}</td>
                      <td>{{ $siswa->nis }}</td>
                      <td>{{ $siswa->nama }}</td>
                      <td>{{ $siswa->kelas->nama_kelas }}</td>
                      <td>{{ $siswa->alamat }}</td>
                      <td>{{ $siswa->no_telp }}</td>
                      <td>{{ $siswa->id_spp }}</td>
                      <td class="d-flex">
                        <a class="nav-link text-dark btn btn-warning p-1" data-toggle="dropdown" href="#" aria-expanded="false">Aksi</a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                            <a href="{{ asset('') }}siswa/edit/{{ $siswa->nisn }}" class="dropdown-item">
                                Edit
                            </a>
                            <a href="{{ asset('') }}siswa/hapus/{{ $siswa->nisn }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
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
              {{ $siswas->links() }}
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