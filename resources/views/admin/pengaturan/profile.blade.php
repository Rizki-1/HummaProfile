@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Profile Perusahaan</title>
  <div class="card p-4 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card p-4">
    <form action="{{ route('profile-perusahaan.update', 1) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 mb-3">
          <div>
            <div class="d-flex justify-content-between align-items-center experience">
              <span class="fw-bold">Detail Perusahaan</span>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" placeholder="Masukkan alamat" name="alamat" rows="3">{{ $profile->alamat }}</textarea>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="Masukkan nomor telepon" name="no_telp" value="{{ $profile->no_telp }}">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" placeholder="Masukkan email" name="email" value="{{ $profile->email }}">
              </div>
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label">Tentang</label>
            <textarea type="text" class="form-control" placeholder="Masukkan tentang" rows="15" name="tentang">{{ $profile->tentang }}</textarea>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div>
            <div class="d-flex justify-content-between align-items-center experience">
              <span class="fw-bold">Sosial Media</span>
            </div>
            <br>
            <div class="repeater">
              <div data-repeater-list="sosmed-group" class="row g-3">
                @if (!old('sosmed-group', []))
                  @foreach ($profile->sosmed as $i => $detail)
                    <div data-repeater-item>
                      <input type="hidden" name="detail_id" value="{{ $detail->id }}">
                      <div class="row">
                        <div class="d-flex flex-row gap-1">
                          <div class="col-3">
                            <label for="unknown" class="form-label">Sosial Media</label>
                            <input type="text" class="form-control @error('name') is-invalid
                                                        @enderror" placeholder="Nama sosmed" name="name" value="{{ $detail->name }}" required>
                            @error('name')
                              <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                              </div>
                            @enderror
                          </div>
                          <div class="col-9 mb-4 ps-2">
                            <label for="unknown" class="form-label">Link Sosmed</label>
                            <div class="d-flex justify-content-between">
                              <div style="width: 100%">
                                <input type="text" class="form-control @error('link') is-invalid
                                                            @enderror"name="link" id="linkSosmed" placeholder="Link Sosmed" value="{{ $detail->link }}"
                                  required>
                                @error('link')
                                  <div class="invalid-feedback">
                                    <p>{{ $message }}</p>
                                  </div>
                                @enderror
                              </div>
                              <div>
                                <input class="btn btn-outline-danger ms-2" data-repeater-delete type="button" value="Hapus" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @else
                  @foreach (old('sosmed-group') as $i => $category)
                    <div data-repeater-item>
                      <div class="row d-none">
                        <div class="d-flex flex-row">
                          <div class="col-6 mb-4 pe-3">
                            <label for="unknown" class="form-label">Nama Sosmed</label>
                            <input required type="text" class="form-control @error('sosmed-group.' . $i . '.name') is-invalid @enderror" placeholder="Nama sosmed" name="name" value="{{ $category['name'] }}" required>
                            @error('sosmed-group.' . $i . '.name')
                              <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                              </div>
                            @enderror
                          </div>
                          <div class="col-6 mb-4 ps-2">
                            <label for="unknown" class="form-label">Link Sosmed</label>
                            <div class="d-flex justify-content-between">
                              <div style="width: 100%">
                                <input required type="number" name="link"
                                  class="form-control @error('sosmed-group.' . $i . '.link') is-invalid
                                                                                                      @enderror" id="linkSosmed" placeholder="Link Sosmed"
                                  value="{{ $category['link'] }}" required>
                                @error('sosmed-group.' . $i++ . '.link')
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
                  @endforeach
                @endif
                <script src="{{ asset('js/formRepeater.js') }}"></script>
              </div>
              <div class="hstack gap-2 justify-content-end">
                <input class="btn btn-outline-success" data-repeater-create type="button" value="+ Tambah" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-md12 mt-5 text-start">
          <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
        </div>
      </div>
    </form>
  </div>
@endsection
