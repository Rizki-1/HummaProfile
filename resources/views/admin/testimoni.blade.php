@extends('layouts.nav-admin')
@section('content')
<form action="{{ route('testimoni.store') }}" method="post">
    @csrf
    <label for="nama">nama</label>
    <input type="text" class="form-control" name="nama">
    <label for="nama">testimoni</label>
    <input type="text" class="form-control" name="testimoni">
    <button type="submit" class="btn btn-success">tambah</button>
</form>
@foreach ($testimoni as $test)
<div class="container">
    <p>{{ $test->nama }}</p>
    <p>{{ $test->testimoni }}</p>
    <form action="{{ route('testimoni.delete', $test->id) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">hapus</button>
    </form>
    <a href="{{ route('testimoni.edit',$test->id) }}" class="btn btn-warning">edit</a>
</div>
@endforeach
@endsection
