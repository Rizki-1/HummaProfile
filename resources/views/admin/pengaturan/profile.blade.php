@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Profile Perusahaan</title>
  <div class="container rounded bg-white">
    <form action="{{ route('profile-perusahaan.update', 1) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="row-md-5 border-right">
          <div class="p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profile Settings</h4>
            </div>

            <!-- Struktur Tabel Input HTML -->
            <div class="row mt-3">
              <div class="col-md-12">
                <label class="labels">Alamat</label>
                <textarea class="form-control" placeholder="Enter alamat" name="alamat" rows="3">{{ $profile->alamat }}</textarea>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <label class="labels">Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="Enter nomor telepon" name="no_telp" value="{{ $profile->no_telp }}">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <label class="labels">Email</label>
                <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{ $profile->email }}">
              </div>
            </div>
          </div>
        </div>
        <div class="row-md-5">
          <div class="p-3">
            <div class="row mt-3">
              <label class="labels">Tentang</label>
              <textarea type="text" class="form-control" placeholder="Enter tentang" rows="15" name="tentang">{{ $profile->tentang }}</textarea>
            </div>
          </div>
        </div>
        <div class="row-md-7">
          <div class="p-3">
            <div class="d-flex justify-content-between align-items-center experience">
              <span>Tambah Sosmed</span>
            </div>
            <br>
            <div class="repeater">
              <div data-repeater-list="sosmed-group" class="row g-3">
                @if (!old('sosmed-group', []))
                  @foreach ($profile->sosmed as $i => $detail)
                    <div data-repeater-item>
                      <input type="hidden" name="detail_id" value="{{ $detail->id }}">
                      <div class="row">
                        <div class="d-flex flex-row">
                          <div class="col-2 mb-4 pe-3">
                            <label for="unknown" class="form-label">Nama Sosmed</label>
                            <input type="text" class="form-control @error('name') is-invalid
                                                        @enderror" placeholder="name" name="name" value="{{ $detail->name }}" required>
                            @error('name')
                              <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                              </div>
                            @enderror
                          </div>
                          <div class="col-5 mb-4 ps-2">
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
                      <div class="row">
                        <div class="d-flex flex-row">
                          <div class="col-6 mb-4 pe-3">
                            <label for="unknown" class="form-label">Nama Sosmed</label>
                            <input required type="text" class="form-control @error('sosmed-group.' . $i . '.name') is-invalid @enderror" placeholder="name" name="name" value="{{ $category['name'] }}" required>
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
          <div class="mt-5 text-center">
            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
