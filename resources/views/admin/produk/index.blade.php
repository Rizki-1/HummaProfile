@extends('layouts.nav-admin')

@section('content')
  <div class="card">
    <div class="d-flex justify-content-between align-items-center px-4 py-4">
      <div class="card-title mb-0">
        Produk Hummatech
      </div>
      <div class="button-act">
        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
      </div>
    </div>
    <div class="card-body">
        <h1>Bababoi</h1>
    </div>
  </div>
@endsection
