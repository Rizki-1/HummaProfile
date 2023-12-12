@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Berita</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
  <script src="{{ asset('cssAdmin/js/select2.js') }}"></script>
  <script src="{{ asset('cssAdmin/vendors/select2/select2.min.js') }}"></script>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $berita->title }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="forms-sample row" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-md-12 row mb-3">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label">Kategori Berita</label>
              <select class="select2 form-select select2-multiple @error('category[]') is-invalid @enderror" multiple="multiple" id="category" name="category[]" multiple data-placeholder="Kategori Berita">
                <optgroup label="Kategori Berita">
                  @foreach ($kategoriBerita as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('category', $berita->kategori->pluck('id')->toArray())) || in_array($category->id, $berita->kategori->pluck('id')->toArray()) ? 'selected' : '' }}>
                      {{ $category->name }}
                    </option>
                  @endforeach
                </optgroup>
              </select>
              @error('category[]')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="title">Judul Berita</label>
              <input required type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="{{ $berita->title }}" value="{{ old('title', $berita->title) }}">
              @error('title')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <label for="myDropify" class="form-label">Upload Gambar Berita <span class="text-danger">Maksimal : 5mb</span>. Ekstensi file : <span class="text-success">Png, Jpg, Jpeg</span></label>
            <div class="drag-and-drop">
              <div class="berita-picture-container">
                <img class="berita-picture-old" src="{{ asset('storage/' . $berita->thumbnail) }}" alt="Foto Berita">
              </div>
              <input name="thumbnail" class="@error('thumbnail') is-invalid @enderror" type="file" id="myDropify" />
              @error('thumbnail')
                <div>
                  <p class="text-danger mt-2">{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
            <div>
              <label class="form-label" for="easyMdeEditor">Deskripsi Berita</label>
              <textarea required class="form-control @error('description') is-invalid @enderror" id="easyMdeEditor" placeholder="{{ $berita->description }}" name="description" rows="7">{{ old('description',$berita->description) }}</textarea>
              @error('description')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
          <div class="col-md-6 col-12 mt-4">
            <button type="submit" class="btn btn-primary me-2 text-white" >Edit</button>
            <a class="btn btn-secondary" href="{{ route('berita.index') }}">Cancel</a>
          </div>
        </div>
    </div>
    </form>
  </div>
  <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#category').select2();
    });

    $(document).ready(function() {
      $('#thumbnail').change(function() {
        var file = this.files[0];

        if (file) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#thumbnail-preview').attr('src', e.target.result).show();
          };

          reader.readAsDataURL(file);
        } else {
          $('#thumbnail-preview').hide();
        }
      });
    });
  </script>
@endsection
