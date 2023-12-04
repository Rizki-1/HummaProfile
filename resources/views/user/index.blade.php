@extends('layouts.nav-user')

@section('content')
  <!-- Hero Start -->
  <div class="section techwix-hero-section-03 d-flex align-items-center"
    style="background-image: url({{ asset('cssUser/images/hero-bg3.jpg') }});">
    <div class="shape-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="944px" height="894px">
        <defs>
          <linearGradient id="PSgrad_0" x1="88.295%" x2="0%" y1="0%" y2="46.947%">
            <stop offset="0%" stop-color="rgb(67,186,255)" stop-opacity="1" />
            <stop offset="100%" stop-color="rgb(113,65,177)" stop-opacity="1" />
          </linearGradient>

        </defs>
        <path fill-rule="evenodd" fill="rgb(43, 142, 254)"
          d="M39.612,410.76 L467.344,29.823 C516.51,-13.476 590.638,-9.94 633.939,39.612 L914.192,317.344 C957.492,366.50 953.109,440.638 904.402,483.939 L476.671,864.191 C427.964,907.492 353.376,903.109 310.76,854.402 L29.823,576.670 C-13.477,527.963 -9.94,453.376 39.612,410.76 Z" />
        <path fill="url(#PSgrad_0)"
          d="M39.612,410.76 L467.344,29.823 C516.51,-13.476 590.638,-9.94 633.939,39.612 L914.192,317.344 C957.492,366.50 953.109,440.638 904.402,483.939 L476.671,864.191 C427.964,907.492 353.376,903.109 310.76,854.402 L29.823,576.670 C-13.477,527.963 -9.94,453.376 39.612,410.76 Z" />
      </svg>
    </div>
    <div class="shape-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="726.5px" height="726.5px">
        <path fill-rule="evenodd" stroke="rgb(255, 255, 255)" stroke-width="1px" stroke-linecap="butt"
          stroke-linejoin="miter" opacity="0.302" fill="none"
          d="M28.14,285.269 L325.37,21.216 C358.860,-8.852 410.655,-5.808 440.723,28.14 L704.777,325.37 C734.846,358.860 731.802,410.654 697.979,440.723 L400.956,704.777 C367.133,734.845 315.338,731.802 285.269,697.979 L21.216,400.955 C-8.852,367.132 -5.808,315.337 28.14,285.269 Z" />
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
          d="M19.529,202.281 L230.531,14.699 C254.559,-6.660 291.353,-4.498 312.714,19.529 L500.295,230.531 C521.656,254.559 519.493,291.353 495.466,312.714 L284.463,500.295 C260.436,521.656 223.641,519.493 202.281,495.466 L14.699,284.463 C-6.660,260.435 -4.498,223.641 19.529,202.281 Z" />
        <path fill="url(#PSgrad_0)"
          d="M19.529,202.281 L230.531,14.699 C254.559,-6.660 291.353,-4.498 312.714,19.529 L500.295,230.531 C521.656,254.559 519.493,291.353 495.466,312.714 L284.463,500.295 C260.436,521.656 223.641,519.493 202.281,495.466 L14.699,284.463 C-6.660,260.435 -4.498,223.641 19.529,202.281 Z" />
      </svg>
    </div>
    <div class="shape-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="972.5px" height="970.5px">
        <path fill-rule="evenodd" stroke="rgb(255, 255, 255)" stroke-width="1px" stroke-linecap="butt"
          stroke-linejoin="miter" fill="none"
          d="M38.245,381.103 L435.258,28.158 C480.467,-12.32 549.697,-7.964 589.888,37.244 L942.832,434.257 C983.23,479.466 978.955,548.697 933.746,588.888 L536.733,941.832 C491.524,982.23 422.293,977.955 382.103,932.746 L29.158,535.733 C-11.32,490.524 -6.963,421.293 38.245,381.103 Z" />
      </svg>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <!-- Hero Content Start -->
          <div class="hero-content">
            {{-- <h3 class="sub-title" data-aos-delay="600" data-aos="fade-up">Technology Related Consultancy</h3> --}}
            <h2 class="title" data-aos="fade-up" data-aos-delay="800">Melayani beberapa divisi tentang IT</h2>{{-- bisa dirubah --}}
            <p data-aos="fade-up" data-aos-delay="900">Kami menyediakan perangkat lunak yang responsif dan fungsional untuk perusahaan dan bisnis</p>
            {{-- <div class="hero-btn" data-aos="fade-up" data-aos-delay="1000">
              <a class="btn" href="about.html">Read More</a>
            </div> --}}
          </div>
          <!-- Hero Content End -->
        </div>
      </div>
    </div>
  </div>
  <!-- Hero End -->

  <!-- About Start -->
  <div class="section techwix-about-section-04 section-padding">
    <div class="shape-1"></div>
    <div class="container">
      <!-- About Wrapper Start -->
      <div class="about-wrap">
        <div class="row">
          <div class="col-lg-6">
            <!-- About Content Wrap Start -->
            <div class="about-content-wrap">
              <div class="section-title">
                <h3 class="sub-title">Tentang Kami</h3>
                <h2 class="title">Kami menjalankan semua jenis layanan perangkat lunak yang menjanjikan kesuksesan Anda
                </h2>
              </div>
              @foreach ($profile as $data)
                <p class="text">{{ $data->tentang }}</p>
              @endforeach
            </div>
            <!-- About Content Wrap End -->
          </div>
          <div class="col-lg-6">
            <!-- About Image Wrap Start -->
            <div class="about-img-wrap">
              <div class="play-btn-02">
                <a class="popup-video" href="https://www.youtube.com/watch?time_continue=3&amp;v=_X0eYtY8T_U"><i
                    class="fas fa-play"></i></a>
              </div>
              <div class="about-img about-img-big">
                <img src="{{ asset('cssUser/images/about-big2.jpg') }}" alt="">
              </div>
              <div class="about-img about-img-sm">
                <img src="{{ asset('cssUser/images/about-sm2.jpg') }}" alt="">
              </div>
            </div>
            <!-- About Image Wrap End -->
          </div>
        </div>
      </div>
      <!-- About Wrapper End -->
    </div>
  </div>
  <!-- About End -->


  <!-- Service Start -->
  <div class="section techwix-service-section-02 service-card-content section-padding"
    style="background-image: url(cssUser/images/bg/service-bg.jpg);">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title">Layanan Perusahaan</h3>
          <h2 class="title">Kami menyediakan solusi Perangkat Lunak yang benar-benar terkemuka.</h2>
        </div>
        <div class="service-content-wrap choose-us-content-wrap">
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <!-- Service Item Start -->
              <div class="service-item service-01">

                <div class="service-content">
                  <h3 class="title"><a>Kelas Industri</a></h3>
                  <p>Merupakan program unggulan kami dalam mendukung pendidikan di Indonesia dengan bekerjasama dengan SMK
                    Negeri/Swasta untuk mencetak Web dan Mobile Developer sesuai kebutuhan DU/DI.</p>
                </div>
              </div>
              <!-- Service Item End -->
            </div>
            <div class="col-xl-3 col-sm-6">
              <!-- Service Item Start -->
              <div class="service-item">

                <div class="service-content">
                  <h3 class="title"><a>Pengembangan Perangkat Lunak</a></h3>
                  <p>Melayani pengembangan aplikasi berbasis Website, Desktop & Mobile Application.</p>
                </div>
              </div>
              <!-- Service Item End -->
            </div>
            <div class="col-xl-3 col-sm-6">
              <!-- Service Item Start -->
              <div class="service-item service-03">

                <div class="service-content">
                  <h3 class="title"><a>Pelatihan Upskilling/Reskilling Berbasis Industri</a></h3>
                  <p>Memberikan pelatihan untuk meningkatkan kompetensi skill dan digital IT untuk guru, siswa & umum.</p>
                </div>
              </div>
              <!-- Service Item End -->
            </div>
            <div class="col-xl-3 col-sm-6">
              <!-- Service Item Start -->
              <div class="service-item">
                <div class="service-content">
                  <h3 class="title"><a>Riset dan Internship/Magang</a></h3>
                  <p>Mendukung dunia vokasi dan bekerjasama dengan SMK / Kampus dalam penelitian teknologi dan
                    pengembangan software serta menerima siswa/mahasiswa/guru untuk magang di industri sesuai dengan
                    kontrak yang telah disepakati.</p>
                </div>
              </div>
              <!-- Service Item End -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="more-choose-content text-center">
                <p>Lihat Selengkapnya <a href="">Disini <i
                      class="fas fa-long-arrow-alt-right"></i></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->

  <!-- Choose Us Start -->
  <div class="section techwix-choose-us-section section-padding"
    style="background-image: url({{ asset('cssUser/images/bg/choose-us') }}-bg.jpg);">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title">Berita</h3>
          <h2 class="title">Berita terbaru terkait perusahaan kami</h2>
        </div>
        <div class="choose-us-content-wrap">
          <div class="row">
            @foreach ($berita as $data)
              <div class="col-lg-4 col-md-6">
                <!-- Choose Us Item Start -->
                <div class="choose-us-item">
                  <div class="choose-us-img">
                    <a href=""><img style="height: 100%; object-fit: cover" src="{{ asset('storage/'. $data->thumbnail) }}"
                        alt=""></a>
                    <div class="choose-us-content">
                      <h3 class="title">{{ $data->title }}</h3>
                      <p>{{ $data->description }}</p>
                    </div>
                  </div>
                </div>
                <!-- Choose Us Item End -->
              </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="more-choose-content text-center">
                <p>Lihat berita lainnya <a href="{{ route('beritaIndex') }}">Disini <i class="fas fa-long-arrow-alt-right"></i></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Choose Us Wrap End -->
    </div>
  </div>
  <!-- Choose Us End -->

  <!-- Testimonial Start  -->
  <div class="section techwix-testimonial-section-02 techwix-testimonial-section-03 section-padding-02">
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
              <div class="swiper-slide">
                <!--  Single Testimonial Start  -->
                <div class="single-testimonial-02">
                  <div class="testimonial-thumb">
                    <img src="{{ asset('cssUser/images/testi-3.jpg') }}" alt="">
                  </div>
                  <div class="testimonial-content">
                    <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                    <p>Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey
                      this this wow manatee </p>
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
                    <p>Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey
                      this this wow manatee </p>
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
                    <p>Accelerate innovation with world-class tech teams Beyond more stoic this along goodness hey
                      this this wow manatee </p>
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

  <!-- Brand Logo Start -->
  <div class="section techwix-brand-section techwix-brand-section-03">
    <div class="container">
      <!-- Brand Wrapper Start -->
      <div class="brand-wrapper text-center">

        <!-- Brand Active Start -->
        <div class="brand-active">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-1') }}.png" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-2') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-3') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-4') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-5') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-6') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-7') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-8') }}.png" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-9') }}.png" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-10') }}.jpg" alt="Brand">
              </div>
              <!-- Single Brand End -->
              <!-- Single Brand Start -->
              <div class="swiper-slide single-brand">
                <img src="{{ asset('cssUser/sekolah/smk-11') }}.png" alt="Brand">
              </div>
              <!-- Single Brand End -->
            </div>
          </div>
        </div>
        <!-- Brand Active End -->
      </div>
      <!-- Brand Wrapper End -->
    </div>
  </div>
  <!-- Brand Logo End -->

  <!-- Blog Start -->
  <div class="section techwix-blog-section section-padding-02">
    <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
        <h4 class="sub-title">Cabang Kami</h4>
        <h2 class="title">Beberapa Cabang Dari PT HummaTech</h2>
      </div>
    </div>
  </div>
  <!-- Blog End -->
@endsection
