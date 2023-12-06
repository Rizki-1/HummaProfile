@extends('layouts.nav-user')

@section('content')
<style>
  .nodata {
    display: flex;
    flex-flow: column;
    align-items: center;
    margin: 3rem 0 0;
  }

  .nodata img {
    height: 12rem;
  }

  .nodata p {
    font-weight: 600;
    font-size: 25px;
  }
</style>
  <!-- Page Banner Start -->
  <div class="section page-banner-section" style="background-image: url({{ asset('cssUser/images/bg/page-banner') }}.jpg);">
    <div class="shape-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="944px" height="894px">
        <defs>
          <linearGradient id="PSgrad_0" x1="88.295%" x2="0%" y1="0%" y2="46.947%">
            <stop offset="0%" stop-color="rgb(67,186,255)" stop-opacity="1" />
            <stop offset="100%" stop-color="rgb(113,65,177)" stop-opacity="1" />
          </linearGradient>

        </defs>
        <path fill-rule="evenodd" fill="rgb(43, 142, 254)"
          d="M39.612,410.76 L467.344,29.824 C516.51,-13.476 590.638,-9.93 633.938,39.613 L914.192,317.344 C957.492,366.50 953.109,440.637 904.402,483.938 L476.671,864.191 C427.964,907.492 353.376,903.109 310.76,854.402 L29.823,576.670 C-13.477,527.963 -9.94,453.376 39.612,410.76 Z" />
        <path fill="url(#PSgrad_0)"
          d="M39.612,410.76 L467.344,29.824 C516.51,-13.476 590.638,-9.93 633.938,39.613 L914.192,317.344 C957.492,366.50 953.109,440.637 904.402,483.938 L476.671,864.191 C427.964,907.492 353.376,903.109 310.76,854.402 L29.823,576.670 C-13.477,527.963 -9.94,453.376 39.612,410.76 Z" />
      </svg>
    </div>
    <div class="shape-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="726.5px" height="726.5px">
        <path fill-rule="evenodd" stroke="rgb(255, 255, 255)" stroke-width="1px" stroke-linecap="butt"
          stroke-linejoin="miter" opacity="0.302" fill="none"
          d="M28.14,285.269 L325.37,21.217 C358.860,-8.851 410.655,-5.808 440.723,28.14 L704.777,325.36 C734.846,358.859 731.802,410.654 697.979,440.722 L400.955,704.776 C367.132,734.844 315.338,731.802 285.269,697.978 L21.216,400.954 C-8.852,367.132 -5.808,315.337 28.14,285.269 Z" />
      </svg>
    </div>
    <div class="shape-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="515px" height="515px">
        <defs>
          <linearGradient id="PSgrad_0" x1="0%" x2="89.879%" y1="0%" y2="43.837%">
            <stop offset="0%" stop-color="rgb(67,186,255)" stop-opacity="1" />
            <stop offset="100%" stop-color="rgb(113,65,177)" stop-opacity="1" />
          </linearGradient>

        </defs>
        <path fill-rule="evenodd" fill="rgb(43, 142, 254)"
          d="M19.529,202.280 L230.531,14.698 C254.559,-6.661 291.353,-4.498 312.714,19.528 L500.295,230.531 C521.656,254.558 519.493,291.353 495.466,312.713 L284.463,500.295 C260.436,521.655 223.641,519.492 202.281,495.465 L14.699,284.462 C-6.660,260.435 -4.498,223.640 19.529,202.280 Z" />
        <path fill="url(#PSgrad_0)"
          d="M19.529,202.280 L230.531,14.698 C254.559,-6.661 291.353,-4.498 312.714,19.528 L500.295,230.531 C521.656,254.558 519.493,291.353 495.466,312.713 L284.463,500.295 C260.436,521.655 223.641,519.492 202.281,495.465 L14.699,284.462 C-6.660,260.435 -4.498,223.640 19.529,202.280 Z" />
      </svg>
    </div>
    <div class="shape-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="972.5px" height="970.5px">
        <path fill-rule="evenodd" stroke="rgb(255, 255, 255)" stroke-width="1px" stroke-linecap="butt"
          stroke-linejoin="miter" fill="none"
          d="M38.245,381.102 L435.258,28.158 C480.467,-12.32 549.697,-7.964 589.888,37.244 L942.832,434.257 C983.23,479.466 978.955,548.697 933.746,588.888 L536.733,941.832 C491.524,982.23 422.293,977.955 382.103,932.745 L29.158,535.732 C-11.32,490.523 -6.963,421.293 38.245,381.102 Z" />
      </svg>
    </div>
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
          <div class="row">
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
    style="background-image: url(assets/images/bg/choose-us-bg2.jpg);">
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
              <div><a href="" class="btn btn-primary">Daftar</a></div>
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
    style="background-image: url({{ asset('cssUser/images/bg/testi-bg4') }}.jpg); padding: 20px;">
    <div class="container">
      <!-- Testimonial Wrap Start  -->
      <div class="testimonial-wrap-02">
        <div class="section-title text-center">
          <h3 class="sub-title">Testimoni</h3>
          <h2 class="title">20k+ satisfied clients worldwide</h2>
        </div>
        <div class="testimonial-content-wrap-02">
          <div class="swiper-container testimonial-02-active">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <!--  Single Testimonial Start  -->
                <div class="single-testimonial-02">
                  <div class="testimonial-thumb">
                    <img src="{{ asset('cssUser/images/testi-3.jpg') }}" alt="">
                  </div>
                  <div class="testimonial-content">
                    <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                    <p>Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey this
                      this wow manatee </p>
                    <span class="name">Mike Holder </span>
                    <span class="designation"> / CEO, Harlond inc</span>
                  </div>
                </div>
                <!--  Single Testimonial End  -->
              </div>
              <div class="swiper-slide">
                <!--  Single Testimonial Start  -->
                <div class="single-testimonial-02">
                  <div class="testimonial-thumb">
                    <img src="{{ asset('cssUser/images/testi-4.jpg') }}" alt="">
                  </div>
                  <div class="testimonial-content">
                    <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                    <p>Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey this
                      this wow manatee </p>
                    <span class="name">Mike Fermalin </span>
                    <span class="designation"> / CEO, Harlond inc</span>
                  </div>
                </div>
                <!--  Single Testimonial End  -->
              </div>
              <div class="swiper-slide">
                <!--  Single Testimonial Start  -->
                <div class="single-testimonial-02">
                  <div class="testimonial-thumb">
                    <img src="{{ asset('cssUser/images/testi-3.jpg') }}" alt="">
                  </div>
                  <div class="testimonial-content">
                    <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                    <p>Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey this
                      this wow manatee </p>
                    <span class="name">Mike Holder </span>
                    <span class="designation"> / CEO, Harlond inc</span>
                  </div>
                </div>
                <!--  Single Testimonial End  -->
              </div>
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
