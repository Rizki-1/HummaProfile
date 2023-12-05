@extends('layouts.nav-admin')
@section('content')
<form action="{{ route('mou.update', $mou->id) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <label for="foto_mou">foto mou</label>
    <input type="file" name="foto_mou" id="" class="form-control">
    <img src="{{ asset('storage/mou/'. $mou->foto_mou) }}" alt="" srcset="" style="width: 100px">
    <label for="foto_mou">nama mou</label>
    <input type="text" name="nama_mou" id="" class="form-control" value="{{ $mou->nama_mou }}">
    <button type="submit" class="btn btn-success">tambah</button>
</form>
@endsection
