@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - List MoU</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Mou</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="{{ route('mou.create') }}" class="btn btn-outline-primary">Tambah Mou</a>
    </div>
  </div>
  <div class="card">
    @if ($mous->count() > 0 || request('query'))
      <div class="card-header">
        <div class="d-flex justify-content-end mt-3 mb-3">
          <form method="get" class="form-inline d-flex flex-row gap-1">
            <input class="form-control" type="search" name="query" placeholder="Search" aria-label="Search" value="{{ request('query') }}">
            <button class="btn btn-outline-success py-0 my-sm-0" type="submit"><i class="mdi mdi-magnify fs-4"></i></button>
          </form>
        </div>
      </div>
    @endif
    <div class="row p-4">
      @forelse ($mous as $row)
        <div class="col-md-4 mb-4 flex-row">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/' . $row->foto_mou) }}" class="image-content" alt="Thumbnail {{ $row->nama_mou }}">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="detail-container">
                  <div class="first-detail">
                    <h2 class="card-title text-truncate" style="width: 100%; margin-bottom: 1px !important;">{{ $row->nama_mou }}</h2>
                  </div>
                </div>
                <div class="action-container">
                  <a href="{{ route('mou.edit', $row->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                  <form nameMoU="{{ $row->nama_mou }}" action="{{ route('mou.destroy', $row->id) }}" method="POST" class="berita hapus">
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
        @if (!request('query'))
          <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p class="mt-3">Mou belum ada</p>
          </div>
        @else
          <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p class="mt-3">Data tidak ada</p>
          </div>
        @endif
      @endforelse
      {{ $mous->links('vendor.pagination.bootstrap-5') }}
    </div>
  </div>
  <script>
    if (document.querySelectorAll('.hapus').length > 0) {
      document.querySelectorAll('.hapus').forEach(function(form) {
        form.addEventListener('submit', function(event) {
          event.preventDefault();
          var nameMoU = form.getAttribute('nameMoU');
          Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus MoU ini '" + nameMoU + "'?",
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
