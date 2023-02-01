@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Transaksi</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @if (session()->has('sukses'))
  <div class="card bg-danger m-3">
    <div class="text-light d-flex justify-content-center align-items-center">
      <p class="p-0 m-2">{{ session('sukses') }}</p>
    </div>
  </div>
  @endif
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="card card-primary">
                    <!-- form start -->
                    <form method="post" action="/transaksi/edit/{{ $transaksi->id }}" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_petugas" value="{{ Auth()->user()->id }}">
                        <input type="hidden" name="id_spp" value="{{ $transaksi->spp->id }}">
                        <div class="form-group">
                          <label for="jumlah_harus_bayar">Jumlah yang harus dibayar</label>
                          @error('jumlah_harus_bayar')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="jumlah_harus_bayar" value="{{ $transaksi->spp->nominal }}" name="jumlah_harus_bayar" placeholder="0" readonly>
                        </div>
                        <div class="form-group">
                          <label for="jumlah_sudah_bayar">Jumlah yang sudah dibayar</label>
                          @error('jumlah_sudah_bayar')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="jumlah_sudah_bayar" value="{{ $transaksi->jumlah_bayar }}" name="jumlah_sudah_bayar" placeholder="0" readonly>
                        </div>
                        <div class="form-group">
                          <label for="jumlah_bayar">Jumlah bayar</label>
                          @error('jumlah_bayar')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="jumlah_bayar" value="{{ old('jumlah_bayar') }}" name="jumlah_bayar" placeholder="Enter jumlah_bayar">
                        </div>
                      <!-- /.card-body -->
                      
                      <div class="">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary float-right" href="{{ asset('') }}transaksi">Kembali</a>
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