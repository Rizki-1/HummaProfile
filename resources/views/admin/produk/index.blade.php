@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="{{ route('produk.create') }}" class="btn btn-outline-primary">Tambah Produk</a>
    </div>
  </div>
  <div class="card p-4">
    <div class="row">
      @forelse ($produks as $row)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/produk/' . $row->foto_produk) }}" class="image-content" alt="Thumbnail {{ $row->id }}">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="detail-container">
                  <div class="first-detail">
                    <h2 class="card-title">{{ $row->nama_produk }}</h2>
                  </div>
                  <div class="second-title">
                    <p class="card-text">{{ $row->keterangan_produk }}</p>
                  </div>
                  <div>
                  </div>
                  <div class="action-container">
                    <a href="{{ route('berita.edit', $row->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
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
        @empty
          <p class="fw-bold text-center">Tidak ada produk. <a href="{{ route('produk.create') }}">Tambah!</a></p>
      @endforelse
      <div>
        {{ $produks->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
@endsection
