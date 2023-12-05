@extends('layouts.nav-admin')
@section('content')
<title>{{ config('app.name', 'Laravel') }} - Produk</title>
<link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
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
        <form action="{{ route('mou.update',$mou->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-md-12 row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="nama_mou" class="form-label">nama mou</label>
                        <input type="text" class="form-control" name="nama_mou" value="{{ $mou->nama_mou }}">
                    </div>
                    <div class="mb-6">
                        <label for="foto_mou" class="form-label">foto mou</label>
                        <div class="mou" style="width: 500px">
                            <img src="{{ asset('storage/mou/'.$mou->foto_mou) }}" alt="" class="product-picture-old">
                        </div>
                        <input type="file" name="foto_mou" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary me-2">tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
