@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/select2/select2.min.css') }}">
  <script src="{{ asset('cssAdmin/js/select2.js') }}"></script>
  <script src="{{ asset('cssAdmin/vendors/select2/select2.min.js') }}"></script>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('berita.store') }}" method="POST" class="forms-sample row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 row mb-3">
          <div class="col-md-6">
            <div class="mb-3">
              <div class="form-group">
                <label class="form-label">Kategori Berita</label>
                <select class="select2 form-control select2-multiple form-select" multiple="multiple" id="category" name="category[]" multiple data-placeholder="Kategori Berita" multiple>
                  <optgroup>
                    @foreach ($kategoriBerita as $category)
                      <option value="{{ $category->id }}" {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                      </option>
                    @endforeach
                  </optgroup>
                </select>
                @error('category')
                    <p></p>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="title">Judul Berita</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Judul Berita" value="{{ old('title') }}">
            </div>
            <div>
              <label class="form-label" for="description">Deskripsi Berita</label>
              <textarea class="form-control" id="description" placeholder="Deskripsi Berita" name="description" rows="6">{{ old('description') }}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <label for="myDropify" class="form-label">Upload Gambar Berita</label>
            <input name="thumbnail" type="file" id="myDropify" />
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
