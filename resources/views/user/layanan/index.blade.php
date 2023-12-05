@extends('layouts.nav-user')

@section('content')
  <!-- Service Start -->
  <div class="section techwix-service-section-02 service-card-content section-padding">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title">Layanan Perusahaan</h3>
          <h2 class="title">Kami menyediakan solusi Perangkat Lunak yang benar-benar terkemuka.</h2>
        </div>
        <div class="service-content-wrap choose-us-content-wrap">
          <div class="row">
            @foreach ($layanan as $key => $data)
              <div class="col-xl-3 col-sm-6">
                <!-- Service Item Start -->
                <div class="service-item service-0{{ ++$key }}">
                  <div class="service-content">
                    <h3 class="title"><a>{{ $data->nama_layanan }}</a></h3>
                    <p>Merupakan program unggulan kami dalam mendukung pendidikan di Indonesia dengan bekerjasama dengan
                      SMK
                      Negeri/Swasta untuk mencetak Web dan Mobile Developer sesuai kebutuhan DU/DI.</p>
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
