@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Gallery</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Gallery</a>
    </div>
  </div>
  <form action="{{ route('gallery.create') }}" method="get">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="col-md-12 mb-3">
            <label for="filter" class="form-label">Tampilkan Di</label>
            <select required name="target_layanan_id" class="form-select @error('target_layanan_id') is-invalid @enderror" id="iddata">
                <option value="">--Pilih salah satu--</option>
                @foreach ($target as $item)
                <option value="{{ $item->id }}">{{ $item->target }}</option>
                @endforeach
            </select>
            @error('target_layanan_id')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
  <div class="card p-4">
    @if ($gallery->count() > 0)
      <div class="d-flex justify-content-end mb-3">
        <form method="get" class="form-inline d-flex flex-row">
          <input class="form-control mr-sm-2 py-0" type="search" name="query" placeholder="Search" aria-label="Search" value="{{ request('query') }}">
          <button class="btn btn-outline-primary py-0 my-sm-0" type="submit"><i class="mdi mdi-magnify fs-4"></i></button>
        </form>
      </div>
    @endif
    <div class="row">
      @forelse ($gallery as $row)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/galery/' . $row->picture) }}" class="image-content" alt="Thumbnail {{ $row->id }}">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="detail-container">
                  <div class="action-container">
                    <a href="{{ route('gallery.edit', $row->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                    <form nameProduk="{{ $row->nama_produk }}" action="{{ route('gallery.destroy', $row->id) }}" method="POST" class="hapus">
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
          <p class="fw-bold text-center">Gallery masih kosong</p>
        @else
          <p class="fw-bold text-center">Gallery tidak ditemukan!</p>
        @endif
      @endforelse
      <div>
        {{ $gallery->links('vendor.pagination.bootstrap-5') }}
      </div>
    </div>
  </div>
  <script>
    if (document.querySelectorAll('.hapus').length > 0) {
      document.querySelectorAll('.hapus').forEach(function(form) {
        form.addEventListener('submit', function(event) {
          event.preventDefault();
          var nameProduk = form.getAttribute('nameProduk');
          Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus foto '" + nameProduk + "'?",
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
