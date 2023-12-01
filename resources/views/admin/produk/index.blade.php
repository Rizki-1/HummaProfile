@extends('layouts.nav-admin')

@section('content')
  <div class="card mb-4 px-4 py-3 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
      </nav>
    </div>
    <div>
      <a href="{{ route('produk.create') }}" class="btn btn-outline-primary">Tambah Produk</a>
    </div>
  </div>

  <div class="card produk-container p-4">
    <div class="row">
      @foreach ($produks as $data)
        <div class="col-md-4 col-lg-4">
          <div class="card image-container">
            <img src="{{ asset('storage/produk/' . $data->foto_produk) }}" alt="{{ $data->nama_produk }}">
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
