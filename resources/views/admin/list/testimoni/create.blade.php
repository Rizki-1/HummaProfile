@extends('layouts.nav-admin')
@section('content')
<title>{{ config('app.name', 'Laravel') }} - Testimoni</title>
<div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
</div>
<div class="card p-4">
    <form action="{{ route('testimoni.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="nama">Nama</label>
                <input type="text" class="form-control mb-3 @error('nama') is-invalid  @enderror" name="nama" required>
                @error('nama')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
                <label for="asal_sekolah">Asal sekolah</label>
                <input type="text" class="form-control mb-3 c" name="asal_sekolah" required>
                @error('asal_sekolah')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
                <label for="testimoni">Testimoni</label>
                <textarea required class="form-control @error('testimoni') is-invalid @enderror" id="testimoni" placeholder="Deskripsi Berita" name="testimoni" rows="7"></textarea>
                @error('testimoni')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="col-6">
                <label for="myDropify" class="form-label">Upload foto</label>
                <input required name="foto_siswa" class="@error('foto_produk') is-invalid @enderror" type="file" id="myDropify" />
                @error('foto_produk')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
    </form>
</div>
@endsection
