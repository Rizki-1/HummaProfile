@extends('layouts.nav-admin')
@section('content')
<title>{{ config('app.name', 'Laravel') }} - Testimoni</title>  
<div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
</div>
<div class="card p-4">
    <form action="{{ route('testimoni.update',$test->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row mb-4">
            <div class="col-6">
                <label for="nama">Nama</label>
                <input type="text" class="form-control mb-3" name="nama" value="{{ $test->nama }}">
                <label for="asal_sekolah">Asal sekolah</label>
                <input type="text" class="form-control mb-3" name="asal_sekolah" value="{{ $test->asal_sekolah }}">
                <label for="nama">Testimoni</label>
                <input type="text" class="form-control mb-3" name="testimoni" value="{{ $test->testimoni }}">
                <label for="nama" style="width: 100%">Foto Lama</label>
                <img src="{{ asset('storage/'.$test->foto_siswa) }}" alt="foto-lama" srcset="" height="100">
            </div>
            <div class="col-6">
                <label for="myDropify" class="form-label">Upload foto</label>
                <input name="foto_siswa" class="@error('foto_produk') is-invalid @enderror" type="file" id="myDropify" />
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
</div>
@endsection

