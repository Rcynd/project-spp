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
          <div class="card glass-card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="">
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
                            <option value="{{ $siswa->id }},{{ $siswa->spp->id }}" selected>{{ $siswa->nama }}</option>
                            @else
                            <option value="{{ $siswa->id }},{{ $siswa->spp->id }}">{{ $siswa->nama }} | {{ $siswa->spp->kelas->nama_kelas }} | Rp.{{ number_format($siswa->spp->nominal) }} | bayaran perbulan = Rp.{{ number_format($siswa->spp->nominal / 12) }}</option>
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
                          <label for="bulan_dibayar">Bulan diBayar</label>
                          @error('bulan_dibayar')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <select class="form-control"name="bulan_dibayar">
                            <option value="januari">januari</option>
                            <option value="februari">februari</option>
                            <option value="maret">maret</option>
                            <option value="april">april</option>
                            <option value="mei">mei</option>
                            <option value="juni">juni</option>
                            <option value="juli">juli</option>
                            <option value="agustus">agustus</option>
                            <option value="september">september</option>
                            <option value="oktober">oktober</option>
                            <option value="november">november</option>
                            <option value="desember">desember</option>
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
                        <a class="btn btn-primary" href="{{ asset('') }}transaksi">Kembali</a>
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