@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="{{ route('berita.create') }}" class="btn btn-outline-primary">Tambah Berita</a>
    </div>
  </div>
  <div class="card p-4">
    <div class="row">
      @foreach ($berita as $row)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/' . $row->thumbnail) }}" class="image-content" alt="Thumbnail {{ $row->id }}">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="detail-container">
                  <div class="first-detail">
                    <h2 class="card-title">{{ $row->title }}</h2>
                  </div>
                  <div class="second-title">
                    <p class="card-text">{{ $row->description }}</p>
                  </div>
                  <div class="third-detail">
                    @foreach ($row->kategori as $kategori)
                      <p>{{ $kategori->name }}</p>
                    @endforeach
                  </div>
                </div>
                <div class="action-container">
                  <a href="#"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                  <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-delete"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <div>
        {{ $berita->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
@endsection
