@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Produk</title>
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
    <div class="d-flex justify-content-end">
        <form method="get" class="form-inline d-flex flex-row">
            <input class="form-control mr-sm-2 py-0" type="search" name="query" placeholder="Search"
                aria-label="Search" value="{{ request('query') }}">
            <button class="btn btn-outline-success py-0 my-sm-0" type="submit"><i
                    class="mdi mdi-magnify fs-4"></i></button>
        </form>
    </div>
    <div class="row">
      @forelse ($produks as $row)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/' . $row->foto_produk) }}" class="image-content" alt="Thumbnail {{ $row->id }}">
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
                    <a href="{{ route('produk.edit', $row->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                    <form nameProduk="{{ $row->nama_produk }}" action="{{ route('produk.destroy', $row->id) }}" method="POST" class="hapus">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="button-delete"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        @if (!request('query'))
            <p class="fw-bold text-center">Tidak ada produk. <a href="{{ route('produk.create') }}">Tambah!</a></p>
        @else
            <p class="fw-bold text-center">Produk tidak ditemukan!</p>
        @endif
      @endforelse
      <div>
        {{ $produks->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
    <script>
    if(document.querySelectorAll('.hapus').length > 0){
    document.querySelectorAll('.hapus').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var nameProduk = form.getAttribute('nameProduk');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Ingin menghapus produk '" + nameProduk + "'?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Ya, Hapus!",
          cancelButtonText: "Batal",
          background: 'var(--bs-body-bg)',
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  }
  </script>
@endsection
