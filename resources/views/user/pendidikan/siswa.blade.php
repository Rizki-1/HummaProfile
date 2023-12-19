@extends('layouts.nav-user')

<title>HummaTech - Siswa</title>

@section('header')
  <meta name="keywords" content="Pendaftaran siswa magang">
  <meta property="og:title" content="siswa magang">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ request()->url() }}">
  <meta property="og:site_name" content="siswa magang hummatech">
@endsection

@section('content')
  {{-- <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('cssUser/css/pendidikan/style.css') }}">
  <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('cssUser/css/gallery/style.css') }}">
  <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>

  <!-- Page Banner Start -->
  <div class="section" style="padding-top: 0px">
    <div class="video">
      <div class="dark-overlay"></div>
      <video class="video-slide active" src="{{ asset('ImageGlobal/industri.mp4') }}" autoplay loop muted playsinline></video>
      <video class="video-slide" src="{{ asset('ImageGlobal/industri_2.mp4') }}" autoplay loop muted playsinline></video>
      <div class="slider-video">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
      </div>
    </div>

    <div class="depan text-depan-video" style="position: absolute; z-index: 3; top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="container">
        <div class="page-banner-wrap">
          <div class="row">
            <div class="col-lg-12">
              <!-- Page Banner Content Start -->
              <div class="page-banner text-center">
                <h2 class="title mb-2">Tentang Magang</h2>
                <p class="text-bawah">Program Magang/PKL kami dirancang khusus untuk para siswa/i SMK Negeri/Swasta dan
                  Mahasiswa/i kuliah yang tertarik dalam pengembangan keahlian di dunia programmer.</p>
              </div>
              <!-- Page Banner Content End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <div class="section techwix-choose-us-section-02 section-padding-02" style="padding-bottom: 110px; background-color: #ffffff;">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="row">
          <div class="col-lg-6">
            <!-- Choose Us Left Start -->
            <div class="choose-us-left pendaftaran">
              <div class="section-title">
                <h3 class="sub-title" data-aos="fade-up-right" data-aos-duration="500">Pendaftaran Magang</h3>
                <h2 class="title text-capitalize" data-aos="fade-up-right" data-aos-duration="700">Dapatkan infomasi
                  terkait pendaftaran
                  magang di sini</h2>
              </div>
              <p class="text mb-3" data-aos="fade-up-right" data-aos-duration="900">
                Kami dengan senang hati membuka kesempatan bagi siswa dan mahasiswa yang bersemangat untuk bergabung
                dengan kami melalui program magang dan Praktek Kerja Lapangan (PKL). Di sini, kami percaya bahwa
                pengalaman di dunia kerja adalah kunci untuk membangun fondasi yang kuat bagi masa depan Anda.
              </p>
              <div style="padding: 10px 0px;" class="btn-pendaftaran" data-aos="fade-up-right" data-aos-duration="1000"><a href="https://pkl.hummatech.com/" target="_blank" class="btn btn-primary">Daftar</a></div>
            </div>
            <!-- Choose Us Left End -->
          </div>
          <div class="col-lg-6 syarat-ketentuan-margin mt-3">
            <h2 class="sub-title text-center" data-aos="fade-up-left" data-aos-duration="500">Syarat & Ketentuan</h2>
            <div class="content-container p-2" style=" max-height: 400px; overflow-y: auto" data-aos="fade-up-left" data-aos-duration="700">
              @forelse ($syarat as $key => $data)
                <div class="syarat-custome mt-3 d-flex gap-4 justify-content-center align-items-center">
                  <div class="icon">
                    <h4>{{ ++$key }}.</h4>
                  </div>
                  <div class="text">
                    <p>{{ $data->syarat_ketentuan }}</p>
                  </div>
                </div>
              @empty
                <div class="nodata gap-3">
                  <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
                  <p class="text-center">Syarat dan ketentuan masih kosong</p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <!-- Choose Us Wrap End -->
    </div>
  </div>

  <!-- Service Start -->
  <div class="section techwix-service-section siswa-index section-padding-02" style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Layanan Magang/PKL</h3>
          <h2 class="title text-capitalize" data-aos="fade-up" data-aos-duration="700">Tingkatkan Pengalaman Anda
            dengan Layanan
            Perusahaan Kami</h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="900">
          @if ($layananSiswa->count() > 0)
            <div class="row justify-content-center">
              @foreach ($layananSiswa as $key => $data)
                <div class="col-xl-3 col-sm-6">
                  <!-- Service Item Start -->
                  <div class="service-item layanan-industri-siswa">
                    <div class="service-content">
                      <div class="image-layanan">
                        <img style="width: 100%; height: 100%; object-fit: cover" src="{{ asset('storage/layanan/' . $data->foto_layanan) }}" alt="">
                      </div>
                      <h3 class="title"><a class="layanan-truncation-title">{{ $data->nama_layanan }}</a></h3>
                      <p class="layanan-truncation-text">{{ $data->descripsi_layanan }}</p>
                    </div>
                  </div>
                  <!-- Service Item End -->
                </div>
              @endforeach
            </div>
          @else
            <div class="nodata gap-3" data-aos="fade-up" data-aos-duration="500">
              <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
              <p>Data layanan tidak tersedia</p>
            </div>
          @endif
        </div>
        <div class="d-flex justify-content-center mt-5" data-aos="fade-up" data-aos-duration="500">
          {{ $layananSiswa->links('pagination::simple-bootstrap-5') }}
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->

  <!-- Testimonial Start  -->
  <div class="section bg-cover techwix-testimonial-section-02 techwix-testimonial-section-03 techwix-testimonial-section-05 section-padding" style="padding: 40px 0; height: fit-content">
    <div class="container">
      <!-- Testimonial Wrap Start  -->
      <div class="testimonial-wrap-02">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Testimoni</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Pengalaman Lulusan Magang Kami</h2>
        </div>
        <div class="testimonial-content-wrap-02" data-aos="fade-up" data-aos-duration="900">
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
                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="900">
                  <!--  Single Testimonial Start  -->
                  <div class="single-testimonial-02">
                    <div class="testimonial-thumb">
                      <img src="{{ asset('ImageGlobal/FotoPemandangan.png') }}" alt="">
                    </div>
                    <div class="testimonial-content">
                      <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                      <div class="truncation">
                        <p>Tetaplah semangat meskipun kamu tidak akan bisa mendapatkan dia</p>
                      </div>
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">Hummatech Team
                      </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/
                        Love from us</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
                <div class="swiper-slide">
                  <!--  Single Testimonial Start  -->
                  <div class="single-testimonial-02">
                    <div class="testimonial-thumb">
                      <img src="{{ asset('ImageGlobal/FotoPemandangan.png') }}" alt="">
                    </div>
                    <div class="testimonial-content">
                      <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                      <div class="truncation">
                        <p>Bintang tidak akan bertahan selamanya, sama seperti mimpi kita ketika kita tidak berusaha
                          menggapainya</p>
                      </div>
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">Hummatech Team
                      </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/
                        Love from us</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="900">
                  <!--  Single Testimonial Start  -->
                  <div class="single-testimonial-02">
                    <div class="testimonial-thumb">
                      <img src="{{ asset('ImageGlobal/FotoPemandangan.png') }}" alt="">
                    </div>
                    <div class="testimonial-content">
                      <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                      <div class="truncation">
                        <p>Tomat itu buah atau sayur? beritahu kami +62 849 3948 3984, semoga beruntung karena no hp ini
                          palsu</p>
                      </div>
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">Hummatech Team
                      </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/
                        Love from us</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="900">
                  <!--  Single Testimonial Start  -->
                  <div class="single-testimonial-02">
                    <div class="testimonial-thumb">
                      <img src="{{ asset('ImageGlobal/FotoPemandangan.png') }}" alt="">
                    </div>
                    <div class="testimonial-content">
                      <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                      <div class="truncation">
                        <p>Apakah kita tidur lebih awal jika kita tidur jam 1 malam? atau tidur lebih lambat?</p>
                      </div>
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">Hummatech Team
                      </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/
                        Love from us</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="900">
                  <!--  Single Testimonial Start  -->
                  <div class="single-testimonial-02">
                    <div class="testimonial-thumb">
                      <img src="{{ asset('ImageGlobal/FotoPemandangan.png') }}" alt="">
                    </div>
                    <div class="testimonial-content">
                      <img src="{{ asset('cssUser/images/testi-icon.png') }}" alt="">
                      <div class="truncation">
                        <p>Manusia akan tinggal di mars pada masa yang akan datang, Anda mungkin akan menjadi salah
                          satunya</p>
                      </div>
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">Hummatech Team
                      </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/
                        Love from us</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
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

  <!-- Gallery Start -->
  <div class="section techwix-service-section section-padding-02" style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h2 class="title" data-aos="fade-up" data-aos-duration="700" style="padding: 20px; text-transform: capitalize">Gallery Magang
            <span style="color: #22B3E2">Humma</span>Tech
          </h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="1000">
          @if ($gallery->count() > 0)
            <div id="gallery" class="container-fluid">
              <ul id="lightgallery" class="list-unstyled">
                @forelse ($gallery->take(16) as $data)
                  <li class="gallery-item" data-responsive="{{ asset('storage/galery/' . $data->picture) }}" data-src="{{ asset('storage/galery/' . $data->picture) }}">
                    <div class="skeleton"></div>
                    <a href="" class="opacity-0">
                      <img src="{{ asset('storage/galery/' . $data->picture) }}" class="img-responsive">
                    </a>
                  </li>
                @empty
                  {{-- Nothing in here --}}
                @endforelse
              </ul>
            </div>
            @if ($gallery->count() > 16)
              <div class="mt-5">
                <div class="gallery-more-text text-center" style="margin-top: 30px">
                  <p>Gallery lainnya <a href="{{ route('gallery.magang') }}">Disini <i class="fas fa-long-arrow-alt-right"></i></a> </p>
                </div>
              </div>
            @endif
          @else
            <div class="nodata gap-3" data-aos="fade-up" data-aos-duration="500">
              <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
              <p>Gallery tidak ada</p>
            </div>
          @endif
        </div>
        <div class="d-flex justify-content-center mt-5">
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Gallery End -->
  <script>
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    let currentSlide = 0;

    var sliderNav = function(manual) {
      btns.forEach(btn => btn.classList.remove("active"));
      slides.forEach(slide => slide.classList.remove("active"));

      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      currentSlide = manual;
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        sliderNav(i);
      });
    });

    function autoSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      sliderNav(currentSlide);
    }

    const intervalId = setInterval(autoSlide, 5000);

    btns.forEach(btn => {
      btn.addEventListener("click", () => {
        clearInterval(intervalId);
      });
    });
  </script>

  <script src="{{ asset('js/galleryFunction.js') }}"></script>
  <script>
    $(document).ready(function() {
      function replaceSkeletonWithImage(skeleton, imageSource) {
        skeleton.next('img').attr('src', imageSource);
        skeleton.remove();

        $('#lightgallery .gallery-item a').each(function() {
          $(this).removeClass('opacity-0');
        });
      }

      // Loop through gallery items and lazy-load images
      $('#lightgallery .gallery-item').each(function() {
        var skeleton = $(this).children('.skeleton');
        var imageSource = $(this).attr('data-src');

        // Lazy-load the image and replace the skeleton when loaded
        $('<img>').attr('src', imageSource).on('load', function() {
          setInterval(() => {

            replaceSkeletonWithImage(skeleton, imageSource);
          }, 2000);
        });
      });
    });
    $('#lightgallery').lightGallery();
  </script>
@endsection
