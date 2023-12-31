@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Produk</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
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
  <div class="card">
    @if ($produks->count() > 0 || request('query'))
      <div class="card-header">
        <div class="d-flex justify-content-end mb-3 mt-3">
          <form method="get" class="form-inline d-flex flex-row gap-1">
            <input class="form-control mr-sm-2 py-0" type="search" name="query" placeholder="Search" aria-label="Search" value="{{ request('query') }}">
            <button class="btn btn-outline-primary py-0 my-sm-0" type="submit"><i class="mdi mdi-magnify fs-4"></i></button>
          </form>
        </div>
      </div>
    @endif
    <div class="row p-4">
      @forelse ($produks as $row)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="image-container">
              <img src="{{ asset('storage/' . $row->foto_produk) }}" class="image-content" alt="Thumbnail {{ $row->id }}">
            </div>
            <div class="image-hover">
              <div class="image-detail">
                <div class="lampiran-hover">
                  <a href="{{ route('galeryproduk.create', $row->id) }}">Lampiran<i class="link-icon lampiran-detail-icon" data-feather="arrow-right"></i></a>
                </div>
                <div class="detail-container">
                  <div class="first-detail">
                    <h2 class="card-title text-truncate" style="max-width: 70%; margin-bottom: 3px !important;">{{ $row->nama_produk }}</h2>
                  </div>
                  <div>
                  </div>
                  <div class="action-container">
                    <a href="{{ route('produk.edit', $row->id) }}"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                    <form nameProduk="{{ $row->nama_produk }}" action="{{ route('produk.destroy', $row->id) }}" method="POST" class="hapus">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="remove-button"><i class="link-icon pg-trash" data-feather="trash"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        @if (!request('query'))
          <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p class="mt-3">Produk belum ada</p>
          </div>
        @else
          <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p>Gallery</p>
          </div>
        @endif
      @endforelse
      <div>
        {{ $produks->links('vendor.pagination.bootstrap-5') }}
      </div>
    </div>
  </div>
  @foreach ($produks as $row)
    <div class="modal fade" id="exampleModal--{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="dropzone" id="dropzone" data-id="{{ $row->id }}"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary" onclick="uploadGallery({{ $row->id }})">Save changes</button> --}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <script>
    if (document.querySelectorAll('.hapus').length > 0) {
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

    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.dropzone').forEach(function(dropzone) {
        const id = dropzone.getAttribute('data-id');

        var myDropzone = new Dropzone("#" + dropzone.id, {
          url: "{{ route('galeryproduk.store', ['id' => ':id']) }}".replace(':id', id),
          headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
          },
          paramName: "file",
          addRemoveLinks: true,
          maxFiles: 10,
          dictDefaultMessage: "Seret dan lepaskan file atau klik untuk memilih file",
          dictRemoveFile: "Hapus file",
          acceptedFiles: "image/*",
          uploadMultiple: true,
          init: function() {
            this.on("removedfile", function(file) {
              if (file.xhr) {
                var fileName = file.name;
                $.ajax({
                  type: 'delete',
                  url: '{{ route('galeryproduk.delete', ':id') }}'.replace(':id', fileName),
                  data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                  },
                  success: function(data) {
                    console.log(data);
                  },
                  error: function(error) {
                    console.error(error);
                  }
                });
              }
            });
          }
        });
      });
    });
  </script>
@endsection
