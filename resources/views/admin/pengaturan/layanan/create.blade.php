@extends('layouts.nav-admin')

@section('content')
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
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
                                                <input required type="text"
                                                    class="form-control @error('layanan-group.' . $i . '.layanan') is-invalid @enderror"
                                                    placeholder="layanan" name="layanan" value="{{ $category['layanan'] }}"
                                                    required>
                                                @error('layanan-group.' . $i . '.layanan')
                                                    <div class="invalid-feedback">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-6 mb-4 ps-2">
                                                <label for="unknown" class="form-label">Jam
                                                    Pelajaran</label>
                                                <div class="d-flex justify-content-between">
                                                    <div style="width: 100%">
                                                        <select name="target_layanan_id" id="target_layanan"
                                                            class="form-select form-select-sm">
                                                            <option value="" disabled selected>--Pilih Target Layanan--</option>
                                                           @foreach ($categoris as $item)
                                                           <option value="{{ $item->id }}">{{ $item->target }}</option>
                                                           @endforeach
                                                        </select>
                                                        @error('layanan-group.' . $i++ . '.target_layanan_id')
                                                            <div class="invalid-feedback">
                                                                <p>{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <input required id="button-hapus-detail"
                                                            class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center"
                                                            data-repeater-delete type="button" value="Hapus" />
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
                                                <input required type="text" class="form-control"
                                                    placeholder="Nama Layanan baru" name="layanan" value="" required>
                                            </div>
                                            <div class="col-6 mb-4 ps-2">
                                                <label for="unknown" class="form-label">Jam
                                                    Pelajaran</label>
                                                <div class="d-flex">
                                                    <label for="target_layanan"></label>
                                                    <select name="target_layanan_id" id="target_layanan"
                                                        class="form-select form-select-sm">
                                                        <option value="" disabled selected>--Pilih Target Layanan--
                                                        </option>
                                                        <option value="1">Siswa</option>
                                                        <option value="2">Industri</option>
                                                    </select>
                                                    <input required id="button-hapus-detail"
                                                        class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center"
                                                        data-repeater-delete type="button" value="Hapus" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div class="hstack gap-2 justify-content-between">
                            <button type="submit" class="btn btn-success">Kirim</button>
                            <input required class="btn btn-outline-success waves-effect waves-light" data-repeater-create
                                type="button" value="+ Tambah" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/formRepeater.js') }}"></script>
@endsection
