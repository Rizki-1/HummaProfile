@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/layanan/layanan.css') }}">
  <title>{{ config('app.name', 'Laravel') }} - Layanan</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('layanan-perusahaan.index') }}">Layanan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body overflow-tohide">
          <form action="{{ route('layanan-perusahaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-12 mb-3 pe-3">
                <label for="myDropify" class="form-label">Icon Layanan</label>
                <div class="upload-icon-container">
                  <i class="link-icon upload-icon" data-feather="upload-cloud"></i>
                </div>
                <input required name="foto_layanan" class="@error('foto_layanan') is-invalid @enderror" type="file" id="myDropify" />
                @error('foto_layanan')
                  <div>
                    <p class="text-danger mt-2">{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="col-md-6 mb-4 pe-3 second-container">
                <div class="mb-3">
                  <label for="unknown" class="form-label">Nama Layanan</label>
                  <input required type="text" class="form-control @error('layanan') is-invalid @enderror" value="{{ old('layanan') }}" placeholder="Nama Layanan baru" name="layanan"  required>
                  @error('layanan')
                    <div class="invalid-feedback">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                </div>
                <div>
                  <label for="target_layanan" class="form-label">Target Layanan</label>
                  <div>
                    <select name="target_layanan_id" id="target_layanan" class="form-select @error('target_layanan_id') is-invalid @enderror">
                      <option value="" disabled selected>--Pilih Target Layanan--
                      </option>
                      @foreach ($categoris as $item)
                        <option value="{{ $item->id }}">{{ $item->target }}</option>
                      @endforeach
                    </select>
                    @error('target_layanan_id')
                      <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4 ps-2">
                <label for="descripsi_layanan" class="form-label">Deskripsi Layanan</label>
                <textarea required name="descripsi_layanan" id="descripsi_layanan" cols="10" rows="5" class="form-control @error('descripsi_layanan') is-invalid @enderror" placeholder="Deskripsi Layanan">{{ old('descripsi_layanan') }}</textarea>
                @error('descripsi_layanan')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href="{{ route('layanan-perusahaan.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="{{ asset('js/formRepeater.js') }}"></script>
@endsection
