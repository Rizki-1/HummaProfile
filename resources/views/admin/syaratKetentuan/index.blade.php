@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/syarat/syarat.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/layanan/layanan.css') }}">
  <title>{{ config('app.name', 'Laravel') }} - Layanan</title>
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Syarat Dan Ketentuan</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="#" class="btn btn-outline-primary" onclick="window.location.href = '{{ route('syarat-dan-ketentuan.create') }}'">Tambah Syarat Dan Ketentuan</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row mb-3 justify-content-between">
            <div class="col-md-3 col-12 mt-3">
              <div class="dataTables_length" id="dataTableExample_length">
                <select name="dataTableExample_length" aria-controls="dataTableExample" class="form-select m-0" id="selectTarget">
                  <option value="all"{{ !request('ct') ? 'selected' : '' }}>semua</option>
                  <option value="1" {{ request('ct') == 1 ? 'selected' : '' }}>Siswa</option>
                  <option value="2" {{ request('ct') == 2 ? 'selected' : '' }}>Industri</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table id="dataTableExample" class="table dataTable no-footer" aria-describedby="dataTableExample_info">
                    <thead>
                      <tr>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Syarat Ketentuan</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($syarat as $row)
                        <tr class="odd">
                          <td class="sorting_1 height-thing" style="transform: translateY(10px)">
                            {{ Str::limit($row->syarat_ketentuan, 50) }}</td>
                          <td class="d-flex gap-2">
                            <a href="{{ route('syarat-dan-ketentuan.edit', $row->id) }}" class="btn btn-outline-warning btn-icon"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                            <form nameLayanan="{{ $row->nama_layanan }}" id="deleteForm" action="{{ route('syarat-dan-ketentuan.destroy', $row->id) }}" method="POST" class="hapus">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger btn-icon"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        {{-- Kosong --}}
                      @endforelse
                    </tbody>
                  </table>
                  @if ($syarat->count() < 1)
                    <div class="nodata mb-5">
                      <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="Tidak ada data">
                      <p>Masih belum ada syarat dan ketentuan</p>
                    </div>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mt-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate">
                    {{ $syarat->links('vendor.pagination.bootstrap-5') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          var nameLayanan = form.getAttribute('nameLayanan');
          Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus layanan '" + nameLayanan + "'?",
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
