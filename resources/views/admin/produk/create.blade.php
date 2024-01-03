@extends('layouts.nav-admin')

@section('content')
  <style>
    .EasyMDEContainer {
      position: relative;
      z-index: 999;
    }
  </style>
  <title>{{ config('app.name', 'Laravel') }} - Produk Create</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
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
          <div class="col-md-12">
            <div class="mb-3">
              <label for="namaproduk" class="form-label">Nama Produk</label>
              <input required type="text" name="nama_produk"
                class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}"
                id="namaproduk" autocomplete="off" placeholder="Hummaprofile">
              @error('nama_produk')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal Dibuat</label>
              <div class="input-group flatpickr mb-3" id="flatpickr-date">
                <input required name="dibuat" type="text" class="form-control @error('dibuat') is-invalid @enderror"
                  value="{{ old('dibuat') }}" id="tanggal" placeholder="2023 - 12 - 15" data-input>
                @error('dibuat')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
                <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
              </div>
            </div>
            {{-- <div class="mb-3">
                <label for="link" class="form-label">link (opsional)</label>
                <div class="input-group flatpickr mb-3" id="">
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" placeholder="link(opsional)">
                    @error('link')
                    <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>
            </div> --}}
          </div>
          <div class="col-md-12 mb-3">
            <label for="myDropify" class="form-label">Upload Gambar Produk <span class="text-danger">Maksimal : 5mb</span>. Ekstensi file : <span class="text-success">Png, Jpg, Jpeg</span></label>
            <input required name="foto_produk" class="@error('foto_produk') is-invalid @enderror" type="file"
              id="myDropify" />
            @error('foto_produk')
              <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="mb-3">
          <label for="easyMdeEditor" class="form-label">Deskripsi Produk</label>
          <textarea name="keterangan_produk" class="form-control @error('keterangan_produk') is-invalid @enderror"
            id="easyMdeEditor" rows="2" style="z-index: 80 !important" placeholder="Hummaprofile adalah website company profile untuk Hummatech">{{ old('keterangan_produk') }}</textarea>
          @error('keterangan_produk')
            <div class="invalid-feedback">
              <p>{{ $message }}</p>
            </div>
          @enderror
        </div>
        <div class="col-md-6 col-12">
          <button type="submit" class="btn btn-primary me-2">Tambah</button>
          <a class="btn btn-secondary" href="{{ route('produk.index') }}">Cancel</a>
        </div>
      </form>
    </div>
  </div>
  <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
@endsection
