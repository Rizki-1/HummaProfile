@extends('layouts.nav-admin')

@section('content')
    <title>{{ config('app.name', 'Laravel') }} - Ubah Password</title>
    <link rel="stylesheet" href="{{ asset('cssAdmin/css/berita/categoryBerita.css') }}">
    <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dot mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card p-4">
        <form action="{{ route('change-pass') }}" method="post" class="flex-column">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="old_pass" class="form-label">Password Lama</label>
                    <input type="password" id="old_pass" name="old_pass" input required
                        class="form-control @error('old_pass') is-invalid @enderror" placeholder="Password lama Anda">
                    @error('old_pass')
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mt-3">
                    <label for="new_pass" class="form-label">Password Baru</label>
                    <input type="password" id="new_pass" name="new_pass" input required
                        class="form-control @error('new_pass') is-invalid @enderror" placeholder="Password baru Anda">
                    @error('new_pass')
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mt-3">
                    <label for="confirmation_pass" class="form-label">Konfirmasi Password</label>
                    <input type="password" id="confirmation_pass" name="confirmation_pass" input required
                        class="form-control @error('confirmation_pass') is-invalid @enderror"
                        placeholder="Konfirmasi password Anda">
                    @error('confirmation_pass')
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="pt-3 float-end">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
