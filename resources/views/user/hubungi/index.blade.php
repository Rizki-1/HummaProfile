@extends('layouts.nav-user')
<title>HummaTech - Hubungi Kami</title>
@section('content')
  <!-- Contact Start -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <div class="section padding-settings techwix-contact-section techwix-contact-section-02 section-padding">
    <div class="container">
      <!-- Contact Wrap Start -->
      <div class="contact-wrap" style="background-image: url(assets/images/shape/contact-shape.png);">
        <div class="row">
          <div class="col-xxl-5 col-lg-6">
            <!-- Contact Info Start -->
            <div class="contact-info">
              <div class="section-title" data-aos="fade-up-right" data-aos-duration="500">
                <h2 class="title">Dapatkan informasi lebih lanjut, Silahkan Hubungi Kami</h2>
              </div>
              <ul>
                @foreach ($profile as $data)
                  <li data-aos="fade-up-right" data-aos-duration="700">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item d-flex align-items-center">
                      <div class="contact-info-icon">
                        <i class="flaticon-phone-call"></i>
                      </div>
                      <div class="contact-info-text">
                        <h4 class="title">Nomor</h4>
                        <p>{{ $data->no_telp }}</p>
                      </div>
                    </div>
                    <!-- Contact Info Item End -->
                  </li>
                  <li data-aos="fade-up-right" data-aos-duration="900">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item d-flex align-items-center">
                      <div class="contact-info-icon">
                        <i class="flaticon-email"></i>
                      </div>
                      <div class="contact-info-text">
                        <h4 class="title">Email</h4>
                        <p>{{ $data->email }}</p>
                      </div>
                    </div>
                    <!-- Contact Info Item End -->
                  </li>
                  <li data-aos="fade-up-right" data-aos-duration="1100">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item d-flex align-items-center">
                      <div class="contact-info-icon">
                        <i class="flaticon-pin"></i>
                      </div>
                      <div class="contact-info-text">
                        <h4 class="title">Lokasi</h4>
                        <p>{{ $data->alamat }}</p>
                      </div>
                    </div>
                    <!-- Contact Info Item End -->
                  </li>
                @endforeach
              </ul>
            </div>
            <!-- Contact Info End -->
          </div>
          <div class="col-xxl-7 col-lg-6">
            <!-- Contact Form Start -->
            <div class="contact-form" data-aos="fade-up-left" data-aos-duration="700">
              <div class="contact-form-wrap">
                <div class="heading-wrap text-center">
                  <span class="sub-title">Customer Support hummatech</span>
                  <h3 class="title">Hubungi Kami disini!</h3>
                </div>
                <form action="{{ route('inbox.store') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Single Form Start -->
                      <div class="single-form">
                        <input name="name" type="text" placeholder="Nama *"
                          @error('name') class="is-invalid" @enderror value="{{ old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                          </div>
                        @enderror
                      </div>
                      <!-- Single Form End -->
                    </div>
                    <div class="col-sm-6">
                      <!-- Single Form Start -->
                      <div class="single-form">
                        <input name="email" type="email" placeholder="Email *"
                          @error('email') class="is-invalid" @enderror value="{{ old('email') }}">
                        @error('email')
                          <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                          </div>
                        @enderror
                      </div>
                      <!-- Single Form End -->
                    </div>
                    <div class="col-sm-12">
                      <!-- Single Form Start -->
                      <div class="single-form">
                        <textarea name="message" placeholder="Masukkan Pesan.." @error('message') class="is-invalid" @enderror>{{ old('message') }}</textarea>
                        @error('message')
                          <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                          </div>
                        @enderror
                      </div>
                      <!-- Single Form End -->
                    </div>
                    <div class="col-sm-12 mt-3  ">
                      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                      <div class="g-recaptcha" id="feedback-recaptcha"
                        data-sitekey="{{ config('app.g-recaptcha-key') }}">
                      </div>
                      @error('g-recaptcha-response')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-sm-12">
                      <!--  Single Form Start -->
                      <div class="form-btn">
                        <button class="btn" type="submit">Kirim Pesan</button>
                      </div>
                      <!--  Single Form End -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- Contact Form End -->
          </div>
        </div>
      </div>
      <!-- Contact Wrap End -->
    </div>
  </div>
  <!-- Contact End -->
  <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session('message'))
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "{{ session('message')['icon'] ?? 'question' }}",
        title: "{{ session('message')['title'] ?? 'No title...' }}"
      });
    </script>
  @endif
@endsection
