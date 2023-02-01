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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="card card-primary">
                    <!-- form start -->
                    <form method="post" action="/transaksi/create" class="mb-5" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nama_petugas">Nama petugas</label>
                          @error('nama_petugas')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <select class="form-control"name="id_petugas">
                            @foreach ($petugass as $petugas)
                            @if (Auth()->user()->id == $petugas->id)
                            <option value="{{ Auth()->user()->id }}" selected>{{ Auth()->user()->nama_petugas }}</option>
                            @else
                            <option value="{{ $petugas->id }}">{{ $petugas->nama_petugas }}</option>
                            @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="nama_siswa">Nama siswa</label>
                          @error('nama_siswa')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <select class="form-control"name="id_siswa">
                            @foreach ($siswas as $siswa)
                            @if (old('id_siswa') == $siswa->id)
                            <option value="{{ $siswa->id }}" selected>{{ $siswa->nama }}</option>
                            @else
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="tgl_bayar">Bulan/Tanggal/Tahun bayar</label>
                          @error('tgl_bayar')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="date" class="form-control" id="tgl_bayar" value="{{ old('tgl_bayar') }}" name="tgl_bayar" placeholder="Enter tgl_bayar">
                        </div>
                        <div class="form-group">
                          <label for="spp">SPP</label>
                          @error('id_spp')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <select class="form-control"name="id_spp">
                            @foreach ($spps as $spp)
                            @if (old('id_spp') == $spp->id)
                            <option value="{{ $spp->id }}" selected>{{ $spp->tahun }} | Rp{{ number_format($spp->nominal) }}</option>
                            @else
                            <option value="{{ $spp->id }}">{{ $spp->tahun }} | Rp{{ number_format($spp->nominal) }}</option>
                            @endif
                            @endforeach
                        </select>
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