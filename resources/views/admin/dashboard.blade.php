@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
  <div class="row justify-content-center flex-wrap">
    <div class="col-md-4">
      <div class="card text-white bg-primary h-100 d-flex flex-row align-items-center">
        <div class="card-body">
            <i class="link-icon" data-feather="box"></i>
        </div>
        <div class="card-body text-end">
          <h5 class="card-title">Jumlah Produk</h5>
          <p class="card-text">{{ $produkCount }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-info h-100 d-flex flex-row align-items-center">
        <div class="card-body">
            <i class="link-icon" data-feather="book-open"></i>
        </div>
        <div class="card-body text-end">
          <h5 class="card-title">Jumlah Berita</h5>
          <p class="card-text">{{ $beritaCount }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-success h-100 d-flex flex-row align-items-center">
        <div class="card-body">
            <i class="link-icon" data-feather="inbox"></i>
        </div>
        <div class="card-body text-end">
          <h5 class="card-title">Jumlah inbox</h5>
          <p class="card-text">{{ $inboxCount }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
