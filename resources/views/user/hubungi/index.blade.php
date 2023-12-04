@extends('layouts.nav-user')

@section('content')
  <!-- Contact Start -->
  <div class="section techwix-contact-section techwix-contact-section-02 section-padding">
    <div class="container">
      <!-- Contact Wrap Start -->
      <div class="contact-wrap" style="background-image: url(assets/images/shape/contact-shape.png);">
        <div class="row">
          <div class="col-xxl-5 col-lg-6">
            <!-- Contact Info Start -->
            <div class="contact-info">
              <div class="section-title">
                <h2 class="title">Dapatkan informasi lebih lanjut, Silahkan Hubungi Kami</h2>
              </div>
              <ul>
                @foreach ($profile as $data)
                  <li>
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
                  <li>
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
                  <li>
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
            <div class="contact-form">
              <div class="contact-form-wrap">
                <div class="heading-wrap text-center">
                  <span class="sub-title">Leave us massage</span>
                  <h3 class="title">How May We Help You!</h3>
                </div>
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Single Form Start -->
                      <div class="single-form">
                        <input name="name" type="text" placeholder="Nama *">
                      </div>
                      <!-- Single Form End -->
                    </div>
                    <div class="col-sm-6">
                      <!-- Single Form Start -->
                      <div class="single-form">
                        <input name="email" type="email" placeholder="Email *">
                      </div>
                      <!-- Single Form End -->
                    </div>
                    <div class="col-sm-12">
                      <!-- Single Form Start -->
                      <div class="single-form">
                        <textarea name="message" placeholder="Masukkan Pesan.."></textarea>
                      </div>
                      <!-- Single Form End -->
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
@endsection