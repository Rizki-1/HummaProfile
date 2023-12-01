@extends('layouts.nav-admin')

@section('content')
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
            <li class="breadcrumb-item"><a href="{{ route('category-berita.index') }}">Kategori</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('category-berita.store') }}" method="POST">
      @csrf
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
      <div class="repeater">
        <div data-repeater-list="category-group" class="row g-3">
          @forelse (old('category-group', []) as $i => $category)
            <div data-repeater-item>
              <div class="row">
                <div class="d-flex flex-row">
                  <div class="col-6 mb-4 pe-3">
                    <label for="unknown" class="form-label">Kategori Berita</label>
                    <input required type="text" class="form-control @error('category-group.' . $i . '.category_name') is-invalid @enderror" placeholder="category_name" name="category_name" value="{{ $category['category_name'] }}" required>
                    @error('category-group.' . $i . '.category_name')
                      <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                      </div>
                    @enderror
                  </div>
                  <div class="col-6 mb-4 ps-2">
                    <div class="d-flex justify-content-between">
                      <div>
                        <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center" data-repeater-delete type="button" value="Hapus" />
                      </div>
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
                      <input required type="text" class="form-control" placeholder="Kategori Berita" name="category_name" value="" required>
                    </div>
                    <div class="col-md-2">
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
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- Include Bootstrap CSS -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('js/formRepeater.js') }}"></script>

  @if (session('message'))
    <script>
      Swal.fire({
        title: "{{ session('message')['title'] ?? 'Tidak di isi' }}",
        text: "{{ session('message')['text'] ?? 'Tesk tidak di isi' }}",
        icon: "{{ session('message')['icon'] ?? 'question' }}"
      });
    </script>
  @endif
@endsection
