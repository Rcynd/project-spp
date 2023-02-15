@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Petugas</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card glass-card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="">
                    <!-- form start -->
                    <form method="post" action="/petugas/create" class="mb-5" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama_petugas">Nama Petugas</label>
                          @error('nama_petugas')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="nama_petugas" value="{{ old('nama_petugas') }}" name="nama_petugas" placeholder="Enter nama_petugas">
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          @error('username')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="username" value="{{ old('username') }}" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          @error('password')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="password" class="form-control" id="password" value="{{ old('password') }}" name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                          <label for="ulangi_password">Ulangi Password</label>
                          @error('ulangi_password')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="password" class="form-control" id="ulangi_password" value="{{ old('ulangi_password') }}" name="ulangi_password" placeholder="Enter ulangi_password">
                        </div>
                        <div class="form-group">
                          <label for="email">Email </label>
                          @error('email')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Enter email">
                        </div>
                      <!-- /.card-body -->
      
                      <div class="">
                        <a class="btn btn-primary" href="{{ asset('') }}petugas">Kembali</a>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
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