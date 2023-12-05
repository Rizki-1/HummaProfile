@extends('layouts.nav-admin')
@section('content')
<form action="{{ route('mou.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="foto_mou">foto mou</label>
    <input type="file" name="foto_mou" id="" class="form-control">
    <label for="foto_mou">nama mou</label>
    <input type="text" name="nama_mou" id="" class="form-control">
    <button type="submit" class="btn btn-success">tambah</button>
</form>
@foreach ($mou as $item)
<div class="container">
    <img src="{{ asset('storage/mou/'. $item->foto_mou) }}" alt="" srcset="" style="width: 100px">
    <p>{{ $item->nama_mou }}</p>
    <form action="{{ route('mou.delete',$item->id) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">hapus</button>
    </form>
    <form action="{{ route('mou.edit',$item->id) }}" method="get">
        @csrf
        <button type="submit" class="btn btn-warning">edit</button>
    </form>
</div>
@endforeach
@endsection
