@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Gallery</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/gallery/gallery.css') }}">
  <script src="{{ asset('cssAdmin/js/select2.js') }}"></script>
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
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
            <div class="col-md-12 mb-3">
                <label for="myDropify" class="form-label">Upload Gambar Berita</label>
                <div class="dropzone" id="dropzone" data-id="{{ $id }}"></div>
                @error('file')
                    <div>
                        <p class="text-danger mt-2">{{ $message }}</p>
                    </div>
                @enderror
            </div>

          <div class="col-md-6 col-12 mt-2">
            <a class="btn btn-secondary" href="{{ route('gallery.index') }}">kembali</a>
          </div>
        </div>
    </div>
    </form>
  </div>
  <!-- Initialize Select2 -->
  <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
  <script>
var myDropzone;

const id = document.querySelector('#dropzone').getAttribute('data-id');

myDropzone = new Dropzone("#dropzone", {
    url: "{{ route('idgalery', ['id' => ':id']) }}".replace(':id', id),
    headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
    },
    autoProcessQueue: true,
    paramName: "file",
    addRemoveLinks: true,
    maxFiles: 10,
    dictDefaultMessage: "Drag and drop files or click to select files",
    dictRemoveFile: "Remove file",
    acceptedFiles: "image/*",
    uploadMultiple: true,
});


    </script>
@endsection
