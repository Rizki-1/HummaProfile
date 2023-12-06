@extends('layouts.nav-admin')

@section('content')
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
          <form action="{{ route('layanan-perusahaan.update', $layanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 d-flex row">
              <div class="col-md-4 mb-3">
                <label for="unknown" class="form-label">Nama Layanan</label>
                <input required type="text" class="form-control @error('nama_layanan') is-invalid @enderror" name="nama_layanan" value="{{ $layanan->nama_layanan }}" placeholder="{{ $layanan->nama_layanan }}">
                @error('nama_layanan')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="unknown" class="form-label">Deskripsi Layanan</label>
                <textarea required name="descripsi" class="form-control @error('descripsi') is-invalid @enderror" rows="1" placeholder="{{ $layanan->descripsi_layanan }}">{{ $layanan->descripsi_layanan }}</textarea>
                @error('descripsi')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="unknown" class="form-label">Target Layanan</label>
                <select required name="target_layanan_id" class="form-select @error('target_layanan_id') is-invalid @enderror">
                  <option value="1" {{ $layanan->target_layanan_id == 1 ? 'selected' : '' }}>Siswa</option>
                  <option value="2" {{ $layanan->target_layanan_id == 2 ? 'selected' : '' }}>Kelas Industry</option>
                </select>
                @error('target_layanan_id')
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
