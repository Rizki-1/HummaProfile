@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/style.css') }}">
  <!-- Service Start -->
  <div class="section techwix-service-section-02 service-card-content section-padding layanan-index" style="padding-bottom: 0px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Layanan Perusahaan</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Kami menyediakan solusi Perangkat Lunak yang
            benar-benar terkemuka.</h2>
        </div>
        <div class="service-content-wrap choose-us-content-wrap" data-aos="fade-up" data-aos-duration="900">
          <div class="row justify-content-center">
            @foreach ($layanan as $key => $data)
              <div class="col-xl-3 col-sm-6">
                <!-- Service Item Start -->
                <div class="service-item service-0{{ ++$key }}">
                  <div class="service-content">
                    <h3 class="title"><a>{{ $data->nama_layanan }}</a></h3>

                    <p>{{ $data->descripsi_layanan }}</p>
                  </div>
                </div>
                <!-- Service Item End -->
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  @endsection
