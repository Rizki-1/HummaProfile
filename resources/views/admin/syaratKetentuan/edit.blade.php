@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/layanan/layanan.css') }}">
  <title>{{ config('app.name', 'Laravel') }} - Layanan</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('syarat-dan-ketentuan.index') }}">Syarat Dan Ketentuan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $syarat->syarat_ketentuan }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body overflow-tohide">
          <form action="{{ route('syarat-dan-ketentuan.update', $syarat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Target Layanan</label>
                  <select required name="target_layanan_id" class="form-select @error('target_layanan_id') is-invalid @enderror">
                    @foreach ($layanan as $lyn)
                      <option value="{{ $lyn->id }}" @if ($syarat->target_layanan_id == $lyn->id) selected @endif>{{ $lyn->target }}</option>
                    @endforeach
                  </select>
                  @error('target_layanan_id')
                    <div class="invalid-feedback">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Syarat Dan Ketentuan</label>
                  <textarea required name="syarat" rows="1" class="form-control @error('syarat') is-invalid @enderror" placeholder="{{ $syarat->syarat_ketentuan }}">{{ $syarat->syarat_ketentuan }}</textarea>
                  @error('target_layanan_id')
                    <div class="invalid-feedback">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href="{{ route('syarat-dan-ketentuan.index') }}" class="btn btn-secondary">Cancel</a>
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
