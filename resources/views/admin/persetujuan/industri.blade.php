@extends('layouts.nav-admin')

@section('content')
  <div class="card">
    <div class="card-body">
      <h6 class="card-title">Data Persetujuan Sekolah Industri</h6>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Industri</th>
              <th>Jenis Industri</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($industris as $key => $data)
              <tr>
                <th>{{ ++$key }}</th>
                <td>{{ $data->nama_industri }}</td>
                <td>{{ $data->jenis_industri }}</td>
                <td>{{ $data->email }}</td>
                <td class="scroll-custome" style="max-width: 200px; overflow: auto">{{ $data->alamat }}</td>
                <td class="d-flex align-items-center gap-2">
                  {{-- Terima --}}
                  <form class="formTerima" action="{{ route('terimaIndustri', $data->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-primary btn-icon"><i class="link-icon"
                        data-feather="check"></i></button>
                  </form>
                  {{-- Tolak --}}
                  <form class="formTolak" action="{{ route('tolakindustri', $data->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-icon"><i class="link-icon"
                        data-feather="x"></i></button>
                  </form>
                  <button type="submit" class="btn btn-success btn-icon" data-bs-toggle="modal"
                    data-bs-target="#documentModal-{{ $data->id }}"><i class="link-icon"
                      data-feather="file-text"></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mt-3 align-items-center">
        {{ $industris->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  @foreach ($industris as $key => $data)
    <div class="modal fade" tabindex="-1" id="documentModal-{{ $data->id }}" aria-labelledby="myExtraLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
          </div>
          <div class="modal-body" style="height: 600px;">
            <embed style="height: 100%; width: 100%" src="{{ asset('storage/industri/' . $data->document) }}" type="application/pdf"> {{-- Content Modal Disini! --}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <script>
    document.querySelectorAll('.formTerima').forEach(function(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
          title: 'Apa anda yakin',
          text: 'Tindakan ini tidak dapat di batalkan',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'batalkan',
          confirmButtonText: 'lanjutkan'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
    document.querySelectorAll('.formTolak').forEach(function(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
          title: 'Apa anda yakin',
          text: 'Tindakan ini tidak dapat di batalkan',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'batalkan',
          confirmButtonText: 'lanjutkan'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  </script>
@endsection
