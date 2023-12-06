@extends('layouts.nav-user')

@section('content')
  {{-- <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('cssUser/css/pendidikan/style.css') }}">

  <!-- Page Banner Start -->
  <div class="section page-banner-section" style="padding-top: 0px">
    <div class="video" style="overflow: hidden">
      <div class="dark-overlay"></div>
      <video src="{{ asset('ImageGlobal/industri.mp4') }}" autoplay loop muted playsinline></video>
    </div>

    <div class="depan" style="position: absolute; z-index: 3; top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="container">
        <div class="page-banner-wrap">
          <div class="row">
            <div class="col-lg-12">
              <!-- Page Banner Content Start -->
              <div class="page-banner text-center">
                <h2 class="title">Tentang Magang</h2>
                {{-- <ul class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ul> --}}
              </div>
              <!-- Page Banner Content End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Service Start -->
  <div class="section techwix-service-section section-padding-02" style="padding: 70px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title">Layanan Magang/PKL</h3>
          <h2 class="title">Tingkatkan Pengalaman Anda dengan Layanan Perusahaan Kami</h2>
        </div>
        <div class="service-content-wrap">
          @if ($layananSiswa->count() > 0)
            <div class="row justify-content-center">
              @foreach ($layananSiswa as $key => $data)
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
          @else
            <div class="nodata gap-3">
              <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
              <p>Data layanan tidak tersedia</p>
            </div>
          @endif
        </div>
        <div class="d-flex justify-content-center mt-5">
          {{ $layananSiswa->links('pagination::simple-bootstrap-5') }}
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->


  <div class="section techwix-choose-us-section-02 section-padding-02"
    style="padding-bottom: 110px; background-color: #ffffff">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="row">
          <div class="col-lg-6">
            <!-- Choose Us Left Start -->
            <div class="choose-us-left">
              <div class="section-title">
                <h3 class="sub-title">Pendaftaran Magang</h3>
                <h2 class="title">Dapatkan infomasi terkait pendaftaran magang di sini</h2>
              </div>
              <p class="text mb-3">Accelerate innovation with world-class tech teams We’ll match you to an entire remote
                team of incredible freelance talent for all your software development needs.</p>
              <div><a href="https://pkl.hummatech.com/" target="_blank" class="btn btn-primary">Daftar</a></div>
            </div>
            <!-- Choose Us Left End -->
          </div>
          <div class="col-lg-6">
            <!-- Choose Us Right Start -->
            <div class="choose-us-right">
              <!-- Faq Accordion Start -->
              <div class="faq-accordion">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span class="title">How Long it takes finished projects ?</span>
                      </button>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body">
                        Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of
                        incredible freelance talent for all your software.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <span class="title">Support &amp; Policy rules?</span>
                      </button>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body">
                        We can help you channel your potential implementing your idea. We take care of all your needs,
                        crafting specific and targeted solutions.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="title">Can we get refund?</span>
                      </button>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body">
                        Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of
                        incredible freelance talent for all your software.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Faq Accordion End -->
            </div>
            <!-- Choose Us Right End -->
          </div>
        </div>
      </div>
      <!-- Choose Us Wrap End -->
    </div>
  </div>

  <!-- Testimonial Start  -->
  <div
    class="section bg-cover techwix-testimonial-section-02 techwix-testimonial-section-03 techwix-testimonial-section-05 section-padding"
    style="padding: 40px;">
    <div class="container">
      <!-- Testimonial Wrap Start  -->
      <div class="testimonial-wrap-02">
        <div class="section-title text-center">
          <h3 class="sub-title">Testimoni</h3>
          <h2 class="title">Pengalaman Lulusan Magang Kami</h2>
        </div>
        <div class="testimonial-content-wrap-02">
          <div class="swiper-container testimonial-02-active">
            <div class="swiper-wrapper">
              @forelse ($testimoni->take(5) as $tm)
                <div class="swiper-slide">
                  <!--  Single Testimonial Start  -->
                  <div class="single-testimonial-02">
                    <div class="testimonial-thumb">
                      <img src="{{ asset('storage/' . $tm->foto_siswa) }}" alt="">
                    </div>
                    <div class="testimonial-content">
                      <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                      <div class="truncation">
                        <p>{{ $tm->testimoni }}</p>
                      </div>
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">{{ $tm->nama }}
                      </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/
                        {{ $tm->asal_sekolah }}</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
              @empty
                <p style="text-align: center">data sedang kosong</p>
              @endforelse
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
      <!-- Testimonial Wrap End  -->
    </div>
  </div>
  <!-- Testimonial End  -->
@endsection
