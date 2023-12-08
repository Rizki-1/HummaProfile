@extends('layouts.nav-admin')
@section('content')
    <title>{{ config('app.name', 'Laravel') }} - Cabang Perusahaan</title>
    <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dot mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('cabang-perusahaan.index') }}">Cabang Perusahaan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $cabang->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card p-4">
        <form action="{{ route('cabang-perusahaan.update', $cabang->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="col-12 mb-4 pe-3">
                <div class="d-flex flex-row">
                    <div class="col-4  me-3">
                        <label for="unknown" class="form-label">Cabang Perusahaan</label>
                        <input required type="text" class="form-control @error('cabang_name') is-invalid @enderror"
                            placeholder="Cabang Perusahaan" name="cabang_name"
                            value="{{ old('cabang_name', $cabang->name) }}" required>
                        @error('cabang_name')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="col-4 me-3">
                        <label for="unknown" class="form-label">Latitude</label>
                        <input required type="text" class="form-control @error('latitude') is-invalid @enderror"
                            placeholder="Contoh -7.900074" name="latitude" value="{{ old('latitude', $cabang->latitude) }}"
                            required>
                        @error('latitude')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="col-4 me-3">
                        <label for="unknown" class="form-label">Longitude</label>
                        <input required type="text" class="form-control @error('longitude') is-invalid @enderror"
                            placeholder="Contoh 112.606886" name="longitude" value="{{ old('longitude', $cabang->longitude) }}"
                            required>
                        @error('longitude')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-row mt-5">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('category-berita.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
        </form>
    </div>
    <!-- Include Bootstrap CSS -->
    <script src="{{ asset('js/formRepeater.js') }}"></script>
@endsection
