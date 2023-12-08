@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Kategori Berita</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('category-berita.index') }}">Cabang Perusahaan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('cabang-perusahaan.store') }}" method="POST">
      @csrf
      <div class="repeater">
        <div data-repeater-list="cabang-group" class="row g-3">
          @forelse (old('cabang-group', []) as $i => $cabang)
            <div data-repeater-item>
              <div class="row">
                <div class="d-flex flex-row">
                  <div class="col-13 mb-4 pe-3 d-flex gap-3 align-items-center">
                    <div class="col-md-4">
                        <label for="unknown" class="form-label">Cabang Perusahaan</label>
                        <input required type="text" class="form-control @error('cabang-group.' . $i . '.cabang_name') is-invalid @enderror" placeholder="Cabang Perusahaan" name="cabang_name" value="{{ $cabang['cabang_name'] }}" required>
                        @error('cabang-group.' . $i . '.cabang_name')
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="unknown" class="form-label">Latitude</label>
                        <input required type="text" class="form-control @error('cabang-group.' . $i . '.latitude') is-invalid @enderror" placeholder="Contoh -7.900074" name="latitude" value="{{ $cabang['latitude'] }}" required>
                        @error('cabang-group.' . $i . '.latitude')
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="unknown" class="form-label">Longitude</label>
                        <input required type="text" class="form-control @error('cabang-group.' . $i . '.longitude') is-invalid @enderror" placeholder="Contoh 112.606886" name="longitude" value="{{ $cabang['longitude'] }}" required>
                        @error('cabang-group.' . $i . '.longitude')
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                  <div class="col-md-2">
                    <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light d-flex justify-content-center align-items-center mt-2" data-repeater-delete type="button" value="Hapus" />
                  </div>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div data-repeater-item>
              <div class="row">
                <div class="d-flex flex-row">
                  <div class="col-13 mb-4 pe-3 d-flex gap-3 align-items-center">
                    <div class="col-md-4">
                      <label for="unknown" class="form-label">Nama Cabang</label>
                      <input required type="text" class="form-control" placeholder="Nama Cabang" name="cabang_name" value="" required>
                    </div>
                    <div class="col-md-4">
                      <label for="unknown" class="form-label">Latitude</label>
                      <input required type="text" class="form-control" placeholder="Latitude perusahaan" name="latitude" value="" required>
                    </div>
                    <div class="col-md-4">
                      <label for="unknown" class="form-label">Longitude</label>
                      <input required type="text" class="form-control" placeholder="Longitude perusahaan" name="longitude" value="" required>
                    </div>
                    <div class="col-md-2">
                      <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light d-flex justify-content-center align-items-center mt-4" data-repeater-delete type="button" value="Hapus" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforelse
        </div>
        <div class="hstack gap-2 justify-content-end">
          <input required class="btn btn-outline-success waves-effect waves-light" data-repeater-create type="button" value="+ Tambah" />
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- Include Bootstrap CSS -->
  <script src="{{ asset('js/formRepeater.js') }}"></script>
@endsection
