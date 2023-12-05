@extends('layouts.nav-admin')
@section('content')
<form action="{{ route('testimoni.update',$test->id) }}" method="post">
    @method('put')
    @csrf
    <input type="text" name="nama" class="form-control" value="{{ $test->nama }}">
    <input type="text" name="testimoni" class="form-control" value="{{ $test->testimoni }}">
    <button type="submit" class="btn btn-success">edit</button>
</form>
@endsection
