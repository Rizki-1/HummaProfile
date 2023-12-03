@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Kategori Berita</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('category-berita.index') }}">Kategori</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('category-berita.update', $category->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="col-12 mb-4 pe-3">
        <label for="unknown" class="form-label">Kategori Berita</label>
        <input required type="text" class="form-control @error('category_name') is-invalid @enderror" placeholder="Kategori Berita" name="category_name" value="{{ $category->name }}" required>
        @error('category_name')
          <div class="invalid-feedback">
            <p>{{ $message }}</p>
          </div>
        @enderror
      </div>
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('category-berita.index') }}" class="btn btn-danger">Cancel</a>
      </div>
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
