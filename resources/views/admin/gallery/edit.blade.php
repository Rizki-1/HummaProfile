@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Gallery</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
  <script src="{{ asset('cssAdmin/js/select2.js') }}"></script>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" class="forms-sample row" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row mb-3">
          <div class="col-md-12 mb-3 de">
            <label for="myDropify" class="form-label">Upload Gambar Gallery <span class="text-danger">Maksimal : 5mb</span>. Ekstensi file : <span class="text-success">Png, Jpg, Jpeg</span></label>
            <div class="drag-and-drop">
              <div class="berita-picture-container">
                <img class="berita-picture-old" src="{{ asset('storage/galery/' . $gallery->picture) }}" alt="Foto Berita">
              </div>
              <input name="picture" class="@error('picture') is-invalid @enderror" type="file" id="myDropify" />
              @error('picture')
                <div>
                  <p class="text-danger mt-2">{{ $message }}</p>
                </div>
              @enderror
            </div>
            @error('thumbnail')
              <div>
                <p class="text-danger mt-2">{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="col-md-12 mb-3">
            <label for="filter" class="form-label">Tampilkan Di</label>
            <select required name="target_layanan_id" class="form-select @error('filter') is-invalid @enderror">
              @foreach ($target as $item)
              <option value="{{ $item->id }}" {{ old('filter', $gallery->target_layanan_id) == $item->id ? 'selected' : '' }}>{{ $item->target }}</option>
              @endforeach
            </select>
            @error('filter')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="col-md-6 col-12 mt-4">
            <button type="submit" class="btn btn-primary me-2">Edit</button>
            <a class="btn btn-secondary" href="{{ route('gallery.index') }}">Cancel</a>
          </div>
        </div>
    </div>
    </form>
  </div>
  <!-- Initialize Select2 -->
  <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
@endsection
