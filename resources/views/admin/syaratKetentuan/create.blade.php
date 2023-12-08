@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Syarat Dan Ketentuan</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item"><a href="{{ route('syarat-dan-ketentuan.index') }}">Syarat Dan Ketentuan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('syarat-dan-ketentuan.store', 1) }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <label class="form-label" for="select">Tampilkan Di</label>
          <select required name="target_layanan_id" class="form-select @error('target_layanan_id') is-invalid @enderror">
            <option value="">--Pilih salah satu--</option>
            @foreach ($layanan as $lyn)
              <option value="{{ $lyn->id }}">{{ $lyn->target }}</option>
            @endforeach
          </select>
          @error('target_layanan_id')
            <div class="invalid-feedback">
              <p>{{ $message }}</p>
            </div>
          @enderror
        </div>
        <div class="col-md-12 mb-3 mt-3">
          <div>
            <div class="repeater">
              <div data-repeater-list="syarat-group">
                @if (!old('syarat-group', []))
                  <div data-repeater-item class="row">
                    <input type="hidden" name="syarat" value="">
                    <label for="unknown" class="form-label">Syarat Dan Ketentuan</label>
                    <div class="col-md-12 mb-3 d-flex gap-3">
                      <textarea type="text" class="form-control @error('syarat') is-invalid @enderror" placeholder="Syarat dan ketentuan" name="syarat" value="" rows="3" required></textarea>
                      @error('syarat')
                        <div class="invalid-feedback">
                          <p>{{ $message }}</p>
                        </div>
                      @enderror
                      <div>
                        <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light" data-repeater-delete type="button" value="Hapus" />
                      </div>
                    </div>
                  </div>
                @else
                  @foreach (old('syarat-group') as $i => $category)
                    <div data-repeater-item>
                      <label for="unknown" class="form-label">Syarat Dan Ketentuan</label>
                      <div class="row d-none">
                        <div class="col-md-11 mb-3">
                          <textarea required type="text" class="form-control @error('syarat-group.' . $i . '.syarat') is-invalid @enderror" placeholder="Syarat Dan Ketentuan" name="syarat" required cols="3">{{ $category['syarat'] }}</textarea>
                          @error('syarat-group.' . $i . '.name')
                            <div class="invalid-feedback">
                              <p>{{ $message }}</p>
                            </div>
                          @enderror
                        </div>
                        <div class="col-md-1">
                          <input required id="button-hapus-detail" class="btn btn-outline-danger waves-effect waves-light ms-2 d-flex justify-content-center align-items-center" data-repeater-delete type="button" value="Hapus" />
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endif
                <script src="{{ asset('js/formRepeater.js') }}"></script>
              </div>
              <div class="hstack gap-2 justify-content-end">
                <input class="btn btn-outline-success mt-3" data-repeater-create type="button" value="+ Tambah" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a href="{{ route('syarat-dan-ketentuan.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
@endsection
