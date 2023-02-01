@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Kelas</h1>
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
                    <form method="post" action="/kelas/edit/{{ $kelas->id }}" class="mb-5" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama_kelas">Nama Kelas</label>
                          @error('nama_kelas')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" name="nama_kelas" placeholder="Enter nama_kelas">
                        </div>
                        <div class="form-group">
                          <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                          @error('kompetensi_keahlian')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="kompetensi_keahlian" value="{{ old('kompetensi_keahlian', $kelas->kompetensi_keahlian) }}" name="kompetensi_keahlian" placeholder="Enter kompetensi_keahlian">
                        </div>
                      <!-- /.card-body -->
      
                      <div class="">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary float-right" href="{{ asset('') }}kelas">Kembali</a>
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