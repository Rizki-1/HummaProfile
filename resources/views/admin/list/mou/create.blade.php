@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Mou</title>
  <div class="card mb-4 p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dot mb-0">
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Mou</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('mou.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 row mb-3">
          <div class="col-md-6">
            <div class="w-100">
              <label for="nama_mou" class="form-label">Nama MoU</label>
              <input type="text" class="form-control @error('nama_mou') is-invalid @enderror" name="nama_mou" placeholder="nama mou">
              @error('nama_mou')
                <div>
                  <p class="text-danger mt-2">{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mt-3 mb-3 gap-2 d-flex align-items-center">
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a class="btn btn-secondary" href="{{ route('mou.index') }}">Cancel</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-6">
              <label for="foto_mou" class="form-label">foto mou</label>
              <input type="file" class="form-control @error('foto_mou') is-invalid @enderror" name="foto_mou" id="myDropify">
              @error('foto_mou')
                <div>
                  <p class="text-danger mt-2">{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
