@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Layanan</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('layanan-perusahaan.index') }}">Layanan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Tambah Layanan</h6>
          <form action="{{ route('layanan-perusahaan.store') }}" class="repeater" method="POST">
            @csrf
            <div data-repeater-list="layanan-group" class="row g-3">
              @forelse (old('layanan-group', []) as $i => $category)
                <div data-repeater-item>
                  <div class="row">
                    <div class="d-flex flex-row">
                      <div class="col-6 mb-4 pe-3">
                        <label for="unknown" class="form-label">Nama Layanan</label>
                        <input required type="text" class="form-control @error('layanan-group.' . $i . '.layanan') is-invalid @enderror" placeholder="layanan" name="layanan" value="{{ $category['layanan'] }}" required>
                        @error('layanan-group.' . $i . '.layanan')
                          <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                          </div>
                        @enderror
                      </div>
                      <div class="col-6 mb-4 ps-2">
                        <label for="target_layanan" class="form-label">Target Layanan</label>
                        <div class="d-flex">
                          <div class="flex-column w-100">
                            <select name="target_layanan_id" id="target_layanan" class="form-select form-select-sm @error('layanan-group.' . $i . '.target_layanan_id') is-invalid @enderror">
                              <option value="" disabled selected>--Pilih Target
                                Layanan--</option>
                              @foreach ($categoris as $item)
                                <option value="{{ $item->id }}" {{ isset($category['target_layanan_id']) ? ($category['target_layanan_id'] == $item->id ? 'selected' : '') : '' }}>
                                  {{ $item->target }}</option>
                              @endforeach
                            </select>
                            @error('layanan-group.' . $i++ . '.target_layanan_id')
                              <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                              </div>
                            @enderror
                          </div>
                          <div>
                            <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center" data-repeater-delete type="button" value="Hapus" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <div data-repeater-item>
                  <div class="row">
                    <div class="d-flex flex-row">
                      <div class="col-6 mb-4 pe-3">
                        <label for="unknown" class="form-label">Nama Layanan</label>
                        <input required type="text" class="form-control" placeholder="Nama Layanan baru" name="layanan" value="" required>
                      </div>
                      <div class="col-6 mb-4 ps-2">
                        <label for="target_layanan" class="form-label">Target Layanan</label>
                        <div class="d-flex">
                          <select name="target_layanan_id" id="target_layanan" class="form-select form-select-sm">
                            <option value="" disabled selected>--Pilih Target Layanan--
                            </option>
                            @foreach ($categoris as $item)
                              <option value="{{ $item->id }}">{{ $item->target }}</option>
                            @endforeach
                          </select>
                          <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center" data-repeater-delete type="button" value="Hapus" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforelse
            </div>
            <div class="hstack gap-2 justify-content-between">
              <button type="submit" class="btn btn-primary">Tambah</button>
              <input required class="btn btn-outline-success waves-effect waves-light" data-repeater-create type="button" value="+ Tambah" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/formRepeater.js') }}"></script>
@endsection
