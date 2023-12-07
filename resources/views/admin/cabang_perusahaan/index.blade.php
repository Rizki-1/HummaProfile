@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Cabang Perusahaan</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/categoryBerita.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Cabang Perusahaan</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="{{ route('cabang-perusahaan.create') }}" class="btn btn-outline-primary">Tambah Cabang</a>
    </div>
  </div>
  <div class="card p-4">
    <div class="row">
      @forelse ($cabang as $item)
        <div class="col-md-4">
          <div class="card p-3 mb-4">
            <div class="category-container">
              <div class="category-item">
                <p class="category-text text-center">{{ $item->name }}</p>
              </div>
              <div class="category-hover">
                <a href="{{ route('cabang-perusahaan.edit', $item->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                <form nameCabang="{{ $item->name }}" action="{{ route('cabang-perusahaan.destroy', $item->id) }}" method="POST" class="hapus">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="button-delete"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p class="fw-bold text-center">Tidak ada Cabang Perusahaan. <a href="{{ route('cabang-perusahaan.create') }}">Tambah!</a></p>
      @endforelse
    </div>
    <div>
        {{ $cabang->links('vendor.pagination.bootstrap-5') }}
    </div>
  </div>
  <script>
    if(document.querySelectorAll('.hapus').length > 0){
    document.querySelectorAll('.hapus').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var nameCabang = form.getAttribute('nameCabang');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Ingin menghapus cabang perusahaan ini '" + nameCabang + "'?",
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
