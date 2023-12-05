@extends('layouts.nav-admin')
@section('content')
<title>{{ config('app.name', 'Laravel') }} - Mou</title>
<div class="card mb-4 p-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-dot mb-0">
      <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Mou</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
  </nav>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('mou.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 row mb-3">
                <div class="col-md-12">
                    <div class="mb-6">
                        <label for="nama_mou" class="form-label">nama mou</label>
                        <input type="text" class="form-control" name="nama_mou" placeholder="nama mou">
                    </div>
                    <div class="mb-6">
                        <label for="foto_mou" class="form-label">foto mou</label>
                        <input type="file" class="form-control" name="foto_mou" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-2">tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
