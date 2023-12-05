@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Daftar Siswa Magang</title>
  <div class="card p-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">List Siswa Magang Terdaftar</li>
        </ol>
      </nav>
    </div>
    <div class="text-end">
      <div id="dataTableExample_filter" class="dataTables_filter d-flex justify-content-end">
        <form method="GET"><label><input type="search" class="form-control" placeholder="Search" name="query" value="{{ request('query') }}" aria-controls="dataTableExample"></label></form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card" style="">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer overflow-hidden">
              <div class="row">
                <div class="col-sm-12">
                  <table id="dataTableExample" class="table dataTable no-footer" aria-describedby="dataTableExample_info">
                    <thead>
                      <tr>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Nama</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Asal Sekolah</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Jurusan</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Kelas</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @forelse ($siswa as $row)
                        <tr class="odd">
                          <td class="sorting_1">{{ $row->nama }}</td>
                          <td class="sorting_1">{{ $row->asal_sekolah }}</td>
                          <td class="sorting_1">{{ $row->jurusan }}</td>
                          <td class="sorting_1">{{ $row->kelas }}</td>
                          <td class="d-flex flex-row">
                            <button type="button" class="btn btn-primary me-2"><i class="link-icon" data-feather="file-text"></i></button>
                            <form nameKategori="{{ $row->nama }}" action="{{ route('list.siswa_magang.del', $row->id) }}" class="hapus" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="link-icon" data-feather="trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="5">
                            <p class="mt-3 mb-3 text-center fw-bold">Tidak Ada Siswa Magang</p>
                          </td>
                        </tr>
                      @endforelse --}}
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate">
                    {{ $siswa->onEachSide(1)->links('layouts.pagination') }}
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
    if(document.querySelectorAll('.hapus').length > 0){
    document.querySelectorAll('.hapus').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var namekategori = form.getAttribute('nameKategori');
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Ingin menghapus kategori '" + namekategori + "'?",
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
