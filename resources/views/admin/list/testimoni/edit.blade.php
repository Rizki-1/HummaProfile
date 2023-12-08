@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Testimoni</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('testimoni.update', $test->id) }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="row mb-4">
        <div class="col-6">
          <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control mb-3 @error('nama') is-invalid  @enderror" name="nama" value="{{ $test->nama }}" placeholder="{{ $test->nama }}">
            @error('nama')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="asal_sekolah">Asal sekolah</label>
            <input type="text" class="form-control mb-3  @error('testimoni') is-invalid @enderror" name="asal_sekolah" placeholder="{{ $test->asal_sekolah }}" value="{{ $test->asal_sekolah }}">
            @error('asal_sekolah')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nama">Testimoni</label>
            <textarea required class="form-control @error('testimoni') is-invalid @enderror" id="testimoni" placeholder="{{ $test->testimoni }}" name="testimoni" rows="7">{{ $test->testimoni }}</textarea>
            @error('testimoni')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <label for="myDropify" style="width: 100%">Upload foto</label>
          <div class="drag-and-drop">
            <div class="berita-picture-container">
              <img class="berita-picture-old" src="{{ asset('storage/' . $test->foto_siswa) }}" alt="Foto Testimmoni">
            </div>
            <input name="foto_siswa" class="@error('foto_siswa') is-invalid @enderror" type="file" id="myDropify" />
            @error('foto_siswa')
              <div>
                <p class="text-danger mt-2">{{ $message }}</p>
              </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12 mt-4">
        <button type="submit" class="btn btn-primary me-2">Edit</button>
        <a class="btn btn-secondary" href="{{ route('testimoni.index') }}">Cancel</a>
      </div>
    </form>
  </div>
@endsection
