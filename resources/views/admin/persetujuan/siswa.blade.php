@extends('layouts.nav-admin')

@section('content')
  <div class="card">
    <div class="card-body">
      <h6 class="card-title">Data Persetujuan Siswa Magang</h6>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Asal Sekolah</th>
              <th>Jurusan</th>
              <th>Kelas</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($siswas as $key => $data)
              <tr>
                <th>{{ ++$key }}</th>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->asal_sekolah }}</td>
                <td>{{ $data->jurusan }}</td>
                <td>{{ $data->kelas }}</td>
                <td class="scroll-custome" style="max-width: 200px; overflow: auto">{{ $data->alamat }}</td>
                <td class="d-flex align-items-center gap-2">
                  {{-- Terima --}}
                  <form action="{{ route('setujusiswa', $data->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-primary btn-icon"><i class="link-icon" data-feather="check"></i></button>
                  </form>
                  {{-- Tolak --}}
                  <form action="{{ route('tolakSiswa', $data->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-icon"><i class="link-icon" data-feather="x"></i></button>
                  </form>
                  {{-- Modal Document --}}
                  <button type="submit" class="btn btn-success btn-icon" data-bs-toggle="modal" data-bs-target="#documentModal"><i class="link-icon" data-feather="file-text"></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mt-3 align-items-center">
        {{ $siswas->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  {{-- Modal Document --}}
  <div class="modal fade" tabindex="-1" id="documentModal" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          {{-- Content Modal Disini! --}}
        </div>
      </div>
    </div>
  </div>
@endsection
