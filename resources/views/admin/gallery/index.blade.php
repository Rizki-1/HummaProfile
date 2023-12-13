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
      <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Gallery</a>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="row mb-3 justify-content-between">
        <div class="col-md-3 col-12 mt-3">
          <div class="dataTables_length" id="dataTableExample_length">
            <select name="dataTableExample_length" aria-controls="dataTableExample" class="form-select m-0" id="selectTarget">
              <option value="all" {{  !request('ct') ? 'selected' : '' }}>semua</option>
              <option value="1" {{ request('ct') == 1 ? 'selected' : '' }}>Siswa</option>
              <option value="2" {{ request('ct') == 2 ? 'selected' : '' }}>Industri</option>
            </select>
          </div>
        </div>
       
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
                <option value="" disabled selected>--Pilih salah satu--</option>
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
          <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p class="mt-3">Gallery belum ada</p>
          </div>
        @else
        <div class="nodata mb-5">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
            <p class="mt-3">Gallery</p>
          </div>
        @endif
      @endforelse
      <div>
        {{ $gallery->links('vendor.pagination.bootstrap-5') }}
      </div>
    </div>
  </div>
  <script>
    document.getElementById('selectTarget').addEventListener('change', function() {
      var selectedCategoryId = this.value;
      var currentUrl = window.location.href;
      var newUrl;
      if (selectedCategoryId == 'all') {
        newUrl = currentUrl.replace(/ct=[^&]*/, '');
      } else {
        var ctParam = 'ct=' + selectedCategoryId;
        if (currentUrl.includes('ct=')) {
          newUrl = currentUrl.replace(/ct=[^&]*/, ctParam);
        } else {
          newUrl = currentUrl + (currentUrl.includes('?') ? '&' : '?') + ctParam;
        }
      }
      window.location.href = newUrl;
    });
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
