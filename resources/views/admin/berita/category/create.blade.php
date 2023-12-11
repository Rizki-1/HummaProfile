@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Kategori Berita</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="repeater">
        <div data-repeater-list="category-group" class="row g-3">
          @forelse (old('category-group', []) as $i => $category)
            <div data-repeater-item>
              <div class="row">
                <div class="d-flex flex-row">
                  <div class="col-12 mb-4 pe-3 d-flex gap-3 align-items-center">
                    <div class="col-md-11">
                      <label for="unknown" class="form-label">Kategori Berita</label>
                      <input required type="text" class="form-control @error('category-group.' . $i . '.category_name') is-invalid @enderror" placeholder="{{ $category['category_name'] }}" name="category_name" value="{{ $category['category_name'] }}"
                        required>
                      @error('category-group.' . $i . '.category_name')
                        <div class="invalid-feedback">
                          <p>{{ $message }}</p>
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light d-flex justify-content-center align-items-center mt-2" data-repeater-delete type="button" value="Hapus" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div data-repeater-item>
              <div class="row">
                <div class="d-flex flex-row">
                  <div class="col-12 mb-4 pe-3 d-flex gap-3 align-items-center">
                    <div class="col-md-11">
                      <label for="unknown" class="form-label">Kategori Berita</label>
                      <input required type="text" class="form-control" placeholder="Viral Sekantor!!" name="category_name" value="" required>
                    </div>
                    <div class="col-md-1">
                      <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light d-flex justify-content-center align-items-center mt-4" data-repeater-delete type="button" value="Hapus" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforelse
        </div>
        <div class="hstack gap-2 justify-content-end">
          <input required class="btn btn-outline-success waves-effect waves-light" data-repeater-create type="button" value="+ Tambah" />
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
  <!-- Include Bootstrap CSS -->
  <script src="{{ asset('js/formRepeater.js') }}"></script>
@endsection
