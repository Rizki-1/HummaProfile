@extends('layouts.nav-admin')

@section('content')
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
              <div class="row">
                <div class="col-md-2">
                  <div class="dataTables_length" id="dataTableExample_length">
                    <select name="dataTableExample_length" aria-controls="dataTableExample" class="form-select m-0" id="selectTarget">
                      <option value="1" {{ !request('ct') ? 'selected' : '' }}>Siswa</option>
                      <option value="2" {{ request('ct') == 2 ? 'selected' : '' }}>Industri</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-10">
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
                          Name</th>
                        <th class="sorting sorting_asc" tabindex="0" style="width: 144.302px;">
                          Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($layanan as $row)
                        <tr class="odd">
                          <td class="sorting_1">{{ $row->layanan }}</td>
                          <td>
                            <button type="button" class="btn btn-warning btn-icon text-white" onclick="showEditPopup({{ $row->id }},{{ $row->target_layanan_id }}, '{{ $row->layanan }}')"><i class="link-icon" data-feather="edit"></i></button>
                            <button type="button" class="btn btn-danger btn-icon" onclick="showDeletePopup({{ $row->id }}, '{{ $row->layanan }}')"><i class="link-icon" data-feather="trash"></i></button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mt-4">
                  <div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate">
                    {{ $layanan->links('pagination::bootstrap-5') }}
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

    function showEditPopup(id, pilihan, name) {
      const defaultOption = pilihan === 1 ? 1 : 2;
      Swal.fire({
        title: 'Edit Layanan',
        html: `
                <input id="editedName" class="swal2-input" value="${name}">
                <select id="editedPilihan" class="swal2-select">
                    <option value="1" ${defaultOption === 1 ? 'selected' : ''}>Siswa</option>
                    <option value="2" ${defaultOption === 2 ? 'selected' : ''}>Industri</option>
                </select>
            `,
        showCancelButton: true,
        confirmButtonText: 'Kirim',
        cancelButtonText: 'Batal',
        preConfirm: () => {
          const editedName = document.getElementById('editedName').value;
          const editedPilihan = document.getElementById('editedPilihan').value;

          fetch('{{ route('layanan-perusahaan.update', '') }}/' + id, {
              method: 'PUT',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
              body: JSON.stringify({
                layanan: editedName,
                target_layanan_id: editedPilihan,
              }),
            })
            .then(response => response.json())
            .then(data => {
              if (data.response.success) {
                Swal.fire({
                  title: 'Sukses!',
                  text: 'Data berhasil diubah.',
                  icon: 'success'
                }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.close || result
                    .dismiss === Swal.DismissReason.esc || result.dismiss ===
                    Swal.DismissReason.overlay || result.dismiss === Swal
                    .DismissReason.timer) {
                    location.reload();
                  }
                });

              } else {
                console.log(data);
                Swal.fire('Error!', 'Terjadi kesalahan saat mengubah data.', 'error');
              }
            });
        },
      });
    }

    function showDeletePopup(id, name) {
      Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Apakah anda yakin ingin menghapus layanan " + name,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          fetch(`{{ route('layanan-perusahaan.destroy', '') }}/${id}`, {
              method: 'DELETE',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
            })
            .then(response => response.json())
            .then(data => {
              if (data.response.success) {
                Swal.fire({
                  title: "Terhapus!",
                  text: "Berhasil menghapus layanan.",
                  icon: "success"
                }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.close || result
                    .dismiss === Swal.DismissReason.esc || result.dismiss ===
                    Swal.DismissReason.overlay || result.dismiss === Swal
                    .DismissReason.timer) {
                    location.reload();
                  }
                });
              } else {
                Swal.fire({
                  title: "Error!",
                  text: "Terjadi kesalahan saat menghapus layanan.",
                  icon: "error"
                });
              }
            });
        }
      });
    }
  </script>
@endsection
