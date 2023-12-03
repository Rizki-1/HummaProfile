@extends('layouts.nav-admin')

@section('content')
  <div class="card mb-4 p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dot mb-0">
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('produk.store') }}" method="POST" class="forms-sample row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 row mb-3">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="namaproduk" class="form-label">Nama Produk</label>
              <input required type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="namaproduk" autocomplete="off" placeholder="Nama Produk">
              @error('nama_produk')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan Produk</label>
              <textarea required name="keterangan_produk" class="form-control @error('keterangan_produk') is-invalid @enderror" id="keterangan" rows="2" placeholder="Keterangan Produk"></textarea>
              @error('keterangan_produk')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div>
              <label for="tanggal" class="form-label">Tanggal Dibuat</label>
              <div class="input-group flatpickr mb-3" id="flatpickr-date">
                <input required name="dibuat" type="text" class="form-control @error('dibuat') is-invalid @enderror" id="tanggal" placeholder="Select date" data-input>
                @error('dibuat')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="myDropify" class="form-label">Upload Gambar Produk</label>
            <input required name="foto_produk" class="@error('foto_produk') is-invalid @enderror" type="file" id="myDropify" />
            @error('foto_produk')
              <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="col-md-6 col-12">
          <button type="submit" class="btn btn-primary me-2">Tambah</button>
          <a class="btn btn-secondary" href="{{ route('produk.index') }}">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection