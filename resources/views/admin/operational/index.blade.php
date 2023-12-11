@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Operasional Kantor</title>
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/flatpickr/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/operational/operational.css') }}">
  <div class="card px-4 py-3 mb-4 flex-row justify-content-between align-items-center">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dot mb-0">
          <li class="breadcrumb-item active pt-2 pb-2" aria-current="page">Jam Operational</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="content-holder">
    <div class="row reverse">
      <div class=" mb-3 @if (isset($edit) or isset($pesan) or isset($detail)) col-md-8 @else col-md-12 @endif">
        <div class="row gaping">
          @foreach ($operational as $orl)
            <div class="@if ($orl->day == 'Minggu') minggu-scretch @endif @if($orl->status == 0) kantor-close @else kantor-open @endif content-card-holder card p-4 mb-2">
              <div class="left-line">
                <div class="line-header">
                  <h4>{{ $orl->day }}</h4>
                </div>
                <div class="d-flex gap-1">
                  <div>{{ \Carbon\Carbon::createFromFormat('H:i:s', $orl->open)->format('H:i') }}</div>
                  <div>-</div>
                  <div>{{ \Carbon\Carbon::createFromFormat('H:i:s', $orl->close)->format('H:i') }}</div>
                </div>
              </div>
              <div class="icon-holder">
                <a href="{{ route('operational.edit', $orl->id) }}"><i class="link-icon edit" data-feather="edit"></i></a>
                @if ($orl->status == 0)
                  <form action="{{ route('operational.open', $orl->id) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $orl->id }}" name="open">
                    <button class="remove-button" type="submit"><i class="link-icon open-kantor" data-feather="check-square"></i></button>
                  </form>
                @else
                  <a href="{{ route('operational.close', $orl->id) }}"><i class="link-icon close" data-feather="x-square"></i></a>
                @endif
                <a href="{{ route('detail.operational', $orl->id) }}"><i class="link-icon eye" data-feather="eye"></i></a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      @if (isset($edit))
        <div class="mb-3 col-md-4 important-content">
          <div class="p-4 card">
            <form action="{{ route('operational.update', $edit->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <input type="hidden" value="{{ $edit->id }}" name="something">
              <h6 class="mb-3 card-title">Edit hari {{ $edit->day }}</h6>
              <div class="mb-3">
                <label for="open" class="form-label">Buka</label>
                <div class="input-group flatpickr" id="flatpickr-time">
                  <input type="time" value="{{ $edit->open }}" class="form-control @error('open') @enderror" name="open" placeholder="Select time" data-input>
                  <span class="input-group-text input-group-addon" data-toggle><i data-feather="clock"></i></span>
                </div>
                @error('open')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="close" class="form-label">Tutup</label>
                <div class="input-group flatpickr" id="flatpickr-time">
                  <input type="time" value="{{ $edit->close }}" class="form-control @error('close') @enderror" name="close" placeholder="Select time" data-input>
                  <span class="input-group-text input-group-addon" data-toggle><i data-feather="clock"></i></span>
                </div>
                @error('close')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-secondary" href="{{ route('operational.index') }}">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      @endif
      @if (isset($pesan))
        <div class="mb-3 col-md-4 important-content">
          <div class="p-4 card">
            <form action="{{ route('operational.closeProccess') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $pesan->id }}" name="something">
              <h6 class="mb-3 card-title">Tutup Hari {{ $pesan->day }}</h6>
              <div class="mb-3">
                <label for="pesan" class="form-label">Alasan Kantor Tutup</label>
                <textarea name="pesan" rows="4" class="form-control @error('pesan') is-invalid @enderror" placeholder="Ada kegiatan camping bersama">
                    @if ($pesan->message) {{ $pesan->message }} @else {{ old('pesan') }} @endif
                </textarea>
                @error('pesan')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Tutup</button>
                <a class="btn btn-secondary" href="{{ route('operational.index') }}">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      @endif
      @if (isset($detail))
        <div class="mb-3 col-md-4 important-content">
          <div class="p-4 card">
            <input type="hidden" value="{{ $detail->id }}" name="something">
            <h6 class="mb-3 card-title">Edit hari {{ $detail->day }}</h6>
            <div class="mb-3">
              <label for="open" class="form-label">Buka</label>
              <div class="input-group flatpickr" id="flatpickr-time">
                <input type="time" readonly value="{{ $detail->open }}" class="form-control" placeholder="Select time" data-input>
                <span class="input-group-text input-group-addon" data-toggle><i data-feather="clock"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <label for="close" class="form-label">Tutup</label>
              <div class="input-group flatpickr" id="flatpickr-time">
                <input type="time" readonly value="{{ $detail->close }}" class="form-control" placeholder="Select time" data-input>
                <span class="input-group-text input-group-addon" data-toggle><i data-feather="clock"></i></span>
              </div>
            </div>
            @if ($detail->message)
              <div class="mb-3">
                <label for="pesan" class="form-label">Alasan Kantor Tutup</label>
                <textarea rows="4" readonly class="form-control" placeholder="{{ $detail->message }}">{{ $detail->message }}</textarea>
              </div>
            @endif
            <div>
              <a href="{{ route('operational.index') }}" class="btn btn-secondary">Close</a>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
  <script src="{{ asset('cssAdmin/vendors/pickr/pickr.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/pickr.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/flatpickr.js') }}"></script>
@endsection
