@extends('layouts.nav-admin')
@section('content')
<title>{{ config('app.name', 'Laravel') }} - Produk</title>
<link rel="stylesheet" href="{{ asset('cssAdmin/css/produk/produk.css') }}">
<div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-dot mb-0">
        <li class="breadcrumb-item active" aria-current="page">Mou</li>
      </ol>
    </nav>
  </div>
  <div class="text-end">
    <a href="{{ route('mou.create') }}" class="btn btn-outline-primary">Tambah Mou</a>
  </div>
</div>
<div class="card p-4">
    <div class="row">
        @forelse ($mous as $mou)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="image-container">
                    <img src="{{ asset('storage/mou/'.$mou->foto_mou) }}" class="image-content" alt="foto_mou" srcset="">
                </div>
            </div>
        </div>
        {{-- <div class="image-hover">
            <div class="image-detail">
                <div class="detail-container">
                    <div class="first-detail">
                        <h2 class="card-detail">{{ $mou->nama_mou }}</h2>
                    </div>
                    <div class="acction-container">
                        <a href=""><i class="link-icon edit-icon" data-feather="edit"></i></a>
                        <form action="{{ route('mou.delete',$mou->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="button-delete"><i class="link-icon trash-icon" data-feather="trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <a href="{{ route('mou.edit', $mou->id) }}" class="nav-link">edit</a>
        <form action="{{ route('mou.delete',$mou->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">hapus</button>
        </form>
        @empty

        @endforelse
    </div>
</div>

@endsection
