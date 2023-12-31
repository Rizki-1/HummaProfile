@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Testimoni</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('testimoni.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12">
          <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" placeholder="Lily Winter" class="form-control mb-3 @error('nama') is-invalid  @enderror" value="{{ old('nama') }}" name="nama" required>
            @error('nama')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="asal_sekolah">Asal sekolah</label>
            <input type="text" placeholder="Smkn 1 Mars" class="form-control mb-3 @error('asal_sekolah') is-invalid  @enderror" value="{{ old('asal_sekolah') }}" name="asal_sekolah" required>
            @error('asal_sekolah')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="testimoni">Testimoni</label>
            <textarea required class="form-control @error('testimoni') is-invalid @enderror" id="testimoni" placeholder="Hummatech adalah tempat magang terbaik" value="{{ old('testimoni') }}" name="testimoni" rows="7"></textarea>
            @error('testimoni')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
        </div>
        <div class="col-12 mb-3">
          <label for="myDropify" class="form-label">Upload foto <span class="text-danger">Maksimal : 5mb</span>. Ekstensi file : <span class="text-success">Png, Jpg, Jpeg</span></label>
          <input required name="foto_siswa" class="@error('foto_produk') is-invalid @enderror" type="file" id="myDropify" />
          @error('foto_produk')
            <div class="invalid-feedback">
              <p>{{ $message }}</p>
            </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6 col-12 mt-4">
        <button type="submit" class="btn btn-primary me-2">Tambah</button>
        <a class="btn btn-secondary" href="{{ route('testimoni.index') }}">Cancel</a>
      </div>
    </form>
  </div>
@endsection
