@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Produk Edit</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/easymde/easymde.min.css') }}">
  <div class="card mb-4 p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dot mb-0">
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $produks->nama_produk }}</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('produk.update', $produks->id) }}" method="POST" class="forms-sample row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12 row mb-3">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="namaproduk" class="form-label">Nama Produk</label>
              <input required type="text" name="nama_produk" value="{{ old('nama_produk',$produks->nama_produk) }}" class="form-control @error('nama_produk') is-invalid @enderror" id="namaproduk" autocomplete="off" placeholder="{{ $produks->nama_produk }}">
              @error('nama_produk')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal Dibuat</label>
              <div class="input-group flatpickr mb-3" id="flatpickr-date">
                <input required name="dibuat" value="{{ old('dibuat',$produks->dibuat) }}" type="text" class="form-control @error('dibuat') is-invalid @enderror" id="tanggal" placeholder="2023 - 12 - 15" data-input>
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
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link',$produks->link) }}" placeholder="link(opsional)">
                    @error('link')
                    <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                    </div>
                    @enderror
                </div>
            </div> --}}
          </div>
          <div class="col-md-12 mb-3 de">
            <label for="myDropify" class="form-label">Upload Gambar Produk <span class="text-danger">Maksimal : 5mb</span>. Ekstensi file : <span class="text-success">Png, Jpg, Jpeg</span></label>
            <div class="drag-and-drop">
              <div class="product-picture-container">
                <img class="product-picture-old" src="{{ asset('storage/' . $produks->foto_produk) }}" alt="Foto produk">
              </div>
              <input name="foto_produk" class="@error('foto_produk') is-invalid @enderror" type="file" id="myDropify" />
              @error('foto_produk')
                <p class="text-danger mt-2">{{ $message }}</p>
              @enderror
            </div>
          </div>
            <div class="mb-3">
              <label for="easyMdeEditor" class="form-label">Keterangan Produk</label>
              <textarea required name="keterangan_produk" class="form-control @error('keterangan_produk') is-invalid @enderror" id="easyMdeEditor" rows="2" placeholder="{{ $produks->keterangan_produk }}">{{ old('keterangan_produk',$produks->keterangan_produk) }}</textarea>
              @error('keterangan_produk')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
          <button type="submit" class="btn btn-primary me-2">Edit</button>
          <a class="btn btn-secondary" href="{{ route('produk.index') }}">Cancel</a>
        </div>
      </form>
    </div>
  </div>
  <script src="{{ asset('cssAdmin/vendors/easymde/easymde.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/email.js') }}"></script>
@endsection
