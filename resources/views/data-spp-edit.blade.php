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
          <div class="card glass-card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="">
                    <!-- form start -->
                    <form method="post" action="/spp/edit/{{ $spp->id }}" class="mb-5" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="tahun">Tahun</label>
                          @error('tahun')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="tahun" value="{{ old('tahun', $spp->tahun) }}" name="tahun" placeholder="Enter tahun">
                        </div>
                        <div class="form-group">
                          <label for="nominal">Nominal</label>
                          @error('nominal')
                            <p class="text-danger">{{ $message }}</p>
                          @enderror
                          <input type="text" class="form-control" id="nominal" value="{{ old('nominal', $spp->nominal) }}" name="nominal" placeholder="Enter nominal">
                        </div>
                      <!-- /.card-body -->
      
                      <div class="">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a class="btn btn-primary float-right" href="{{ asset('') }}spp">Kembali</a>
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