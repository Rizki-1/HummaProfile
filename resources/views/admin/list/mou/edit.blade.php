@extends('layouts.nav-admin')
@section('content')
    <title>{{ config('app.name', 'Laravel') }} - Produk</title>
    <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/berita.css') }}">
    <div class="card mb-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dot mb-0">
                <li class="breadcrumb-item"><a href="{{ route('mou.index') }}">mou</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $mou->nama_mou }}</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mou.update', $mou->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-md-12 row mb-3">
                    <div class="col-md-6">
                        <div class="w-100">
                            <label for="nama_mou" class="form-label">Nama MoU</label>
                            <input type="text" class="form-control @error('nama_mou') is-invalid @enderror"
                                name="nama_mou" placeholder="nama mou" value="{{ $mou->nama_mou }}">
                            @error('nama_mou')
                                <div>
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2 mt-2">Edit</button>
                    </div>
                    <div class="col-md-6">
                        <div class="drag-and-drop">
                            <div class="berita-picture-container">
                                <img class="berita-picture-old" src="{{ asset('storage/' . $mou->foto_mou) }}"
                                    alt="Foto Berita">
                            </div>
                            <input name="foto_mou" class="@error('foto_mou') is-invalid @enderror" type="file"
                                id="myDropify" />
                            @error('foto_mou')
                                <div>
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
