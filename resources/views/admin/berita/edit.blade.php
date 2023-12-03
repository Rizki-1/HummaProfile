@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Berita</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/select2/select2.min.css') }}">
  <script src="{{ asset('cssAdmin/js/select2.js') }}"></script>
  <script src="{{ asset('cssAdmin/vendors/select2/select2.min.js') }}"></script>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('berita.create') }}">create</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit</li>
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
                        <option value="{{ $category->id }}" {{ (in_array($category->id, old('category', $berita->kategori->pluck('id')->toArray())) || in_array($category->id, $berita->kategori->pluck('id')->toArray())) ? 'selected' : '' }}>
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
              <input required type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul Berita" value="{{ $berita->title }}">
              @error('title')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div>
              <label class="form-label" for="description">Deskripsi Berita</label>
              <textarea required class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi Berita" name="description" rows="2">{{ $berita->description }}</textarea>
              @error('description')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <label for="myDropify" class="form-label">Upload Gambar Berita</label>
            <img src="{{ asset('storage/'.$berita->thumbnail) }}" alt="" style="width: 100px; height: 20%">
            <input  name="thumbnail" class="@error('thumbnail') is-invalid @enderror" type="file" id="myDropify" />
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
