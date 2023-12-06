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
      <a href="{{ route('testimoni.create') }}" class="btn btn-outline-primary">Tambah</a>
    </div>
  </div>
  <div class="card p-4">
    <div class="row">
      @foreach ($testimoni as $test)
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="d-flex gap-4 mb-4">
                <div>
                  <img src="{{ asset('storage/' . $test->foto_siswa) }}" alt="foto" class="foto">
                </div>
                <div>
                  <p>{{ $test->nama }}</p>
                  <p>{{ $test->asal_sekolah }}</p>
                </div>
              </div>
              <p>{{ $test->testimoni }}</p>
              <div class="d-flex gap-2 mt-4 float-right justify-content-end">
                <form action="{{ route('testimoni.delete', $test->id) }}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                </form>
                <a href="{{ route('testimoni.edit', $test->id) }}" class="btn btn-warning"><i class="link-icon edit-icon" data-feather="edit"></i></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      {{ $testimoni->links('pagination::bootstrap-5') }}
    </div>
  </div>
@endsection
