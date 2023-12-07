@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/layanan/layanan.css') }}">
  <title>{{ config('app.name', 'Laravel') }} - Layanan</title>
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Layanan</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <a href="#" class="btn btn-outline-primary" onclick="window.location.href = '{{ route('layanan-perusahaan.create') }}'">Tambah Layanan</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive overflow-hidden">
            <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              <div class="row mb-3">
                <div class="col-md-2 mb-3">
                  <div class="dataTables_length" id="dataTableExample_length">
                    <select name="dataTableExample_length" aria-controls="dataTableExample" class="form-select m-0" id="selectTarget">
                      <option value="1" {{ !request('ct') ? 'selected' : '' }}>Siswa</option>
                      <option value="2" {{ request('ct') == 2 ? 'selected' : '' }}>Industri</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-10 mb-3">
                  <div id="dataTableExample_filter" class="dataTables_filter text-end">
                    <form method="GET"><label><input type="search" class="form-control" placeholder="Search" name="query" value="{{ request('query') }}" aria-controls="dataTableExample"></label></form>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="dataTableExample" class="table dataTable no-footer" aria-describedby="dataTableExample_info">
                    <thead>
                      <tr>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Nama Layanan</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Deckripsi layanan</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($layanan as $row)
                        <tr class="odd">
                          <td class="sorting_1 height-thing" style="transform: translateY(10px)">{{ Str::limit($row->nama_layanan, 50) }}</td>
                          <td class="sorting_1 height-thing" style="transform: translateY(10px)">
                            {{ Str::limit($row->descripsi_layanan, 50) }}
                            <!-- Ganti angka 50 dengan jumlah kata maksimum yang ingin Anda tampilkan -->
                        </td>
                          <td class="d-flex gap-2">
                            <a href="{{ route('layanan-perusahaan.edit', $row->id) }}" class="btn btn-outline-warning btn-icon"><i class="link-icon edit-icon" data-feather="edit"></i></a>
                            <form nameLayanan="{{ $row->nama_layanan }}" id="deleteForm" action="{{ route('layanan-perusahaan.destroy', $row->id) }}" method="POST" class="hapus">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-icon"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <style>
                  </style>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mt-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate">
                    {{ $layanan->links('vendor.pagination.bootstrap-5') }}
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
      if (selectedCategoryId == 1) {
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

    if(document.querySelectorAll('.hapus').length > 0){
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
