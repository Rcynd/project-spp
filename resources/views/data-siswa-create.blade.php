@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Siswa</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="card card-primary">
                    <!-- form start -->
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
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary float-right" href="{{ asset('') }}siswa">Kembali</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection