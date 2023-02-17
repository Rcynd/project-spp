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
                        <input type="hidden" name="id_petugas" value="{{ auth()->user()->id }}">
                        <div class="form-group">
                          <label for="nama_siswa">Nama siswa</label>
                          @error('nama_siswa')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <select class="form-control"name="id_siswa">
                            @foreach ($siswas as $siswa)
                            @if (old('id_siswa') == $siswa->id)
                            <option value="{{ $siswa->id }},{{ $siswa->spp->id }},{{ $siswa->kelas->id }}" selected>{{ $siswa->nama }} | {{ $siswa->kelas->nama_kelas }} | Jumlah Bayar = Rp.{{ number_format($siswa->spp->nominal) }}</option>
                            @else
                            <option value="{{ $siswa->id }},{{ $siswa->spp->id }},{{ $siswa->kelas->id }}">{{ $siswa->nama }} | {{ $siswa->kelas->nama_kelas }} | Jumlah Bayar = Rp.{{ number_format($siswa->spp->nominal) }}</option>
                            @endif
                            @endforeach
                        </select>
                        </div>
                        <input type="hidden" name="tgl_bayar" value="{{ now() }}">
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
                      <!-- /.card-body -->
      
                      <div class="">
                        <a class="btn btn-primary" href="{{ asset('') }}transaksi">Kembali</a>
                        <button type="submit" class="btn btn-success float-right">Bayar</button>
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