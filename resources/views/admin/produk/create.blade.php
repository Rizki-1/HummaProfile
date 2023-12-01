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
              <input type="text" name="nama_produk" class="form-control" id="namaproduk" autocomplete="off"
                placeholder="Produk">
            </div>
            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan Produk</label>
              <textarea name="keterangan_produk" class="form-control" id="keterangan" rows="2"></textarea>
            </div>
            <div>
              <label for="tanggal" class="form-label">Tanggal Dibuat</label>
              <div class="input-group flatpickr mb-3" id="flatpickr-date">
                <input name="dibuat" type="text" class="form-control" id="tanggal" placeholder="Select date"
                  data-input>
                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="myDropify" class="form-label">Upload Gambar Produk</label>
            <input name="foto_produk" type="file" id="myDropify" />
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
