@extends('layouts.nav-admin')
@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/layanan/layanan.css') }}">
  <title>{{ config('app.name', 'Laravel') }} - Layanan</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('layanan-perusahaan.index') }}">Layanan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $layanan->nama_layanan }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('layanan-perusahaan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 d-flex row">
              <div class="col-md-2 hover">
                <label for="myDropify" class="form-label">Logo Layanan</label>
                <div class="upload-icon-container">
                  <i class="link-icon upload-icon" data-feather="upload-cloud"></i>
                </div>
                <div class="image-old">
                  <img style="width: 100%; height: 100%; object-fit: cover" src="{{ asset('storage/layanan/'.$layanan->foto_layanan) }}" alt="">
                </div>
                <input name="foto_layanan" class="@error('foto_layanan') is-invalid @enderror" type="file" id="myDropify" />
                @error('foto_layanan')
                  <div>
                    <p class="text-danger mt-2">{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-6 mb-3">
                <label for="unknown" class="form-label">Nama Layanan</label>
                <input required type="text" class="form-control @error('nama_layanan') is-invalid @enderror" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" placeholder="{{ $layanan->nama_layanan }}">
                @error('nama_layanan')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror

                <label for="unknown" class="form-label mt-3">Target Layanan</label>
                <select required name="target_layanan_id" class="form-select @error('target_layanan_id') is-invalid @enderror">
                  @foreach ($categoris as $item)
                    <option value="{{ $item->id }}" {{ old('target_layanan_id', $layanan->target_layanan_id) == $item->id ? 'selected' : '' }}>
                      {{ $item->target }}</option>
                  @endforeach
                </select>
                @error('target_layanan_id')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="unknown" class="form-label">Deskripsi Layanan</label>
                <textarea required name="descripsi_layanan" class="form-control @error('descripsi_layanan') is-invalid @enderror" rows="5" placeholder="{{ $layanan->descripsi_layanan }}">{{ old('descripsi_layanan', $layanan->descripsi_layanan) }}</textarea>
                @error('descripsi_layanan')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
            </div>
            <div class="gap-2">
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href="{{ route('layanan-perusahaan.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
