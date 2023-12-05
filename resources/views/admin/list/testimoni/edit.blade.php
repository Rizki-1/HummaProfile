@extends('layouts.nav-admin')
@section('content')
    <title>{{ config('app.name', 'Laravel') }} - Testimoni</title>
    <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
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
        <form action="{{ route('testimoni.update', $test->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row mb-4">
                <div class="col-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control mb-3" name="nama" value="{{ $test->nama }}">
                    <label for="asal_sekolah">Asal sekolah</label>
                    <input type="text" class="form-control mb-3" name="asal_sekolah" value="{{ $test->asal_sekolah }}">
                    <label for="nama">Testimoni</label>
                    <textarea required class="form-control @error('testimoni') is-invalid @enderror" id="testimoni" placeholder="Deskripsi Berita" name="testimoni" rows="7">{{ $test->testimoni }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="myDropify" style="width: 100%">Foto Lama</label>
                    <div class="drag-and-drop">
                        <div class="berita-picture-container">
                            <img class="berita-picture-old" src="{{ asset('storage/' . $test->foto_siswa) }}"
                                alt="Foto Testimmoni">
                        </div>
                        <input name="foto_siswa" class="@error('foto_siswa') is-invalid @enderror"
                            type="file" id="myDropify" />
                        @error('foto_siswa')
                            <div>
                                <p class="text-danger mt-2">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
@endsection
