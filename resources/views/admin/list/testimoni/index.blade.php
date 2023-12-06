@extends('layouts.nav-admin')
@section('content')
  <style>
    .tes {
      background-color: pink;
      padding: 10px
    }

    .foto {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 10px;
    }

    .edit-icon {
      color: yellow !important;
      margin: 0 !important;
    }

    .trash-icon {
      color: red !important;
    }

    .danger-button:hover .trash-icon {
      color: white !important;
    }
  </style>
  <title>{{ config('app.name', 'Laravel') }} - Testimoni</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/categoryBerita.css') }}">
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
    @if ($testimoni->count() > 0)
      <div class="d-flex justify-content-end mb-3">
        <form method="get" class="form-inline d-flex flex-row">
          <input class="form-control mr-sm-2 py-0" type="search" name="query" placeholder="Search" aria-label="Search" value="{{ request('query') }}">
          <button class="btn btn-outline-primary py-0 my-sm-0" type="submit"><i class="mdi mdi-magnify fs-4"></i></button>
        </form>
      </div>
    @endif
    <div class="row">
      @forelse ($testimoni as $test)
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex gap-4 mb-4">
                <div>
                  <img src="{{ asset('storage/' . $test->foto_siswa) }}" alt="foto" class="foto">
                </div>
                <div style="display: flex; justify-content: center; align-items: center; width: 72%; flex-direction: column">
                  <h3 class="text-truncate" style="max-width: 90%">{{ $test->nama }}</h3>
                  <h6 class="text-truncate" style="max-width: 90%">{{ $test->asal_sekolah }}</h5>
                </div>
              </div>
              <p>{{ $test->testimoni }}</p>
              <div class="d-flex gap-2 mt-4 float-right justify-content-end">
                <form nameTestimoni="{{ $test->nama }}" action="{{ route('testimoni.destroy', $test->id) }}" method="post" class="hapus">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger danger-button"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                </form>
                <a href="{{ route('testimoni.edit', $test->id) }}" class="btn btn-outline-warning"><i class="link-icon edit-icon" data-feather="edit"></i></a>
              </div>
            </div>
          </div>
        </div>
      @empty
        @if (!request('query'))
          <p class="fw-bold text-center">Tidak ada testimoni. <a href="{{ route('testimoni.create') }}">Tambah!</a></p>
        @else
          <p class="fw-bold text-center">Data tidak ditemukan.</p>
        @endif
      @endforelse
      {{ $testimoni->links('pagination::bootstrap-5') }}
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
