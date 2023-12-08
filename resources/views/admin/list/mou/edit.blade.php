@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Produk</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <div class="card mb-4 p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dot mb-0">
        <li class="breadcrumb-item"><a href="{{ route('mou.index') }}">mou</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $mou->nama_mou }}</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('mou.update', $mou->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mb-3">
            <div class="col-12 col-md-12 mb-3">
              <label for="nama_mou" class="form-label">Nama Sekolah</label>
              <input type="text" class="form-control @error('nama_mou') is-invalid @enderror" name="nama_mou"
                placeholder="{{ $mou->nama_mou }}" value="{{ $mou->nama_mou }}">
              @error('nama_mou')
                <div>
                  <p class="text-danger mt-2">{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="col-md-12">
              <div class="mb-2">
                <div class="drag-and-drop">
                    <label for="foto_mou" class="form-label">Logo Sekolah</label>
                    <div class="berita-picture-container">
                        <img class="berita-picture-old" src="{{ asset('storage/'. $mou->foto_mou) }}" alt="" srcset="">
                    </div>
                    <input type="file" class="form-control @error('foto_mou') is-invalid @enderror" name="foto_mou"
                      id="myDropify">
                    @error('foto_mou')
                      <div>
                        <p class="text-danger mt-2">{{ $message }}</p>
                      </div>
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="mt-5 d-flex align-items-left gap-2">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a class="btn btn-secondary" href="{{ route('mou.index') }}">Cancel</a>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
@endsection
