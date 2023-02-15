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
          <div class="card glass-card">
            <div class="card-header">
              <a href="{{ asset('') }}siswa/create" class="btn float-left tombol-tambah mt-2">Tambah Siswa</a>
              {{-- <p class="btn float-left tombol-tambah mt-2" data-toggle="modal" data-target="#modal-lg">Tambah Siswa</p> --}}

                  <form class="input-group input-group-sm col-lg-5 mr-2 mt-3 float-right" action="/siswa" method="get">
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
                    {{-- <th>id_spp</th> --}}
                    <th>aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                    <tr>
                      <td>{{ $siswa->nisn }}</td>
                      <td>{{ $siswa->nis }}</td>
                      <td>{{ $siswa->nama }}</td>
                      <td>{{ $siswa->spp->kelas->nama_kelas }}</td>
                      <td>{{ $siswa->alamat }}</td>
                      <td>{{ $siswa->no_telp }}</td>
                      {{-- <td>{{ $siswa->id_spp }}</td> --}}
                      <td class="d-flex justify-content-center">
                        <a class="nav-link text-dark btn bg-hitam tombol-tambah p-2" data-toggle="dropdown" href="#" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:50px;">
                            <a href="{{ asset('') }}siswa/edit/{{ $siswa->nisn }}" class="dropdown-item">
                                Edit
                            </a>
                            <a href="{{ asset('') }}siswa/hapus/{{ $siswa->nis }}" class="dropdown-item" onclick="return confirm(' Hapus Data? \n Data yang dihapus tidak bisa dikembalikan!')">
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
  {{-- <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah data Siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/siswa/create" class="mb-5" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nisn">NISN</label>
              @error('nisn')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="nisn" value="{{ old('nisn') }}" name="nisn" placeholder="Enter nisn">
            </div>
            <div class="form-group">
              <label for="nis">NIS</label>
              @error('nis')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="nis" value="{{ old('nis') }}" name="nis" placeholder="Enter nis">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              @error('nama')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="nama" value="{{ old('nama') }}" name="nama" placeholder="Enter nama">
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              @error('id_kelas')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <select class="form-control"name="id_kelas">
                @foreach ($kelass as $kelas)
                @if (old('id_kelas') == $kelas->id)
                <option value="{{ $kelas->id }}" selected>{{ $kelas->nama_kelas }}</option>
                @else
                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endif
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="alamat">alamat</label>
                @error('alamat')
                <p class="text-danger">{{ $message }}</p>
              @enderror
                <textarea id="description" class="form-control" name="alamat"rows="3">{{ old('alamat') }}</textarea>
            </div>
            <div class="form-group">
              <label for="no_telp">No_telp</label>
              @error('no_telp')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="no_telp" value="{{ old('no_telp') }}" name="no_telp" placeholder="Enter no_telp">
            </div>
            <div class="form-group">
              <label for="spp">SPP</label>
              @error('id_spp')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="spp" value="{{ old('id_spp') }}" name="id_spp" placeholder="Enter spp">
            </div>
          <!-- /.card-body -->

          <div class="">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal --> --}}
@endsection