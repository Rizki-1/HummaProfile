@extends('layouts.nav-admin')
@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/testimoni/styleindex.css') }}">
  <title>{{ config('app.name', 'Laravel') }} - Testimoni</title>
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Testimoni</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="{{ route('testimoni.create') }}" class="btn btn-outline-primary">Tambah Testimoni</a>
    </div>
  </div>
  <div class="card p-4">
    @if ($testimoni->count() > 0 || request('query'))
      <div class="d-flex justify-content-end mb-3">
        <form method="get" class="form-inline d-flex flex-row">
          <input class="form-control mr-sm-2 py-0" type="search" name="query" placeholder="Search" aria-label="Search" value="{{ request('query') }}">
          <button class="btn btn-outline-primary py-0 my-sm-0" type="submit"><i class="mdi mdi-magnify fs-4"></i></button>
        </form>
      </div>
    @endif
    <div class="row">
      @forelse ($testimoni as $test)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/' . $test->foto_siswa) }}" alt="foto" class="image-content">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="detail-container">
                  <div class="first-detail">
                    <h2 class="card-title text-truncate mb-0" style="max-width: 90%">{{ $test->nama }}</h2>
                  </div>
                  <div>
                    <p class="second-detail mb-2">
                      {{ $test->asal_sekolah }}
                    </p>
                  </div>
                  <div class="third-title">
                    <p class="card-text text-truncate" style="max-width: 70%">{{ $test->testimoni }}</p>
                  </div>
                </div>
                <div class="action-container">
                  <a href="{{ route('testimoni.edit', $test->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                  <form nameTestimoni="{{ $test->nama }}" action="{{ route('testimoni.destroy', $test->id) }}" method="POST" class="berita">
                    @csrf
                    @method('delete')
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
            <p class="mt-3">Testimoni belum ada</p>
          </div>
        @else
          <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p class="mt-3">Data tidak di temukan</p>
          </div>
        @endif
      @endforelse
      {{ $testimoni->links('vendor.pagination.bootstrap-5') }}
    </div>
  </div>
  <script>
    if (document.querySelectorAll('.hapus').length > 0) {
      document.querySelectorAll('.hapus').forEach(function(form) {
        form.addEventListener('submit', function(event) {
          event.preventDefault();
          var nameTestimoni = form.getAttribute('nameTestimoni');
          Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus testimoni '" + nameTestimoni + "'?",
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
