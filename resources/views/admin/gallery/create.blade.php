@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Gallery</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
  <script src="{{ asset('cssAdmin/js/select2.js') }}"></script>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('gallery.store') }}" method="POST" class="forms-sample row" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <div class="col-md-12">
            <label for="filter" class="form-label">Target Gallery</label>
            <select name="picture"></select>
          </div>
          <div class="col-md-12">
            <label for="myDropify" class="form-label">Upload Gambar Berita</label>
            <input name="thumbnail" class="@error('thumbnail') is-invalid @enderror" type="file" id="myDropify" />
            @error('thumbnail')
              <div>
                <p class="text-danger mt-2">{{ $message }}</p>
              </div>
            @enderror
          </div>
          <div class="col-md-6 col-12 mt-4">
            <button type="submit" class="btn btn-primary me-2">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('berita.index') }}">Cancel</a>
          </div>
        </div>
    </div>
    </form>
  </div>
  <!-- Initialize Select2 -->
  <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
@endsection
