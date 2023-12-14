@extends('layouts.nav-user')
<title>HummaTech - Industri</title>
@section('content')
  {{-- <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('cssUser/css/pendidikan/style.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/gallery/style.css') }}">
  <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
  <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>

  <!-- Page Banner Start -->
  <div class="section" style="padding-top: 0px;">
    <div class="video">
      <div class="dark-overlay"></div>
      <video class="video-slide active" src="{{ asset('ImageGlobal/industri.mp4') }}" autoplay loop muted
        playsinline></video>
      <video class="video-slide" src="{{ asset('ImageGlobal/industri_2.mp4') }}" autoplay loop muted playsinline></video>
      <div class="slider-video">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
      </div>
    </div>

    <div class="depan text-depan-video"
      style="position: absolute; z-index: 3; top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="container">
        <div class="page-banner-wrap">
          <div class="row">
            <div class="col-lg-12">
              <!-- Page Banner Content Start -->
              <div class="page-banner text-center">
                <h2 class="title mb-2">Tentang Kelas Industri</h2>
                <p class="text-bawah">Program ini merupakan kolaborasi antara sekolah dan PT HummaTech, memberikan
                  kelas tambahan pemrograman. Fokusnya adalah mendalami konsep-konsep terkini untuk mempersiapkan siswa/i
                  menghadapi tantangan industri.</p>
              </div>
              <!-- Page Banner Content End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <!-- Kenapa Industri Start -->
  <div class="section techwix-about-section-07 section-padding branding" style="padding-top: 80px; padding-bottom: 0px;">
    <div class="shape-1"></div>
    <div class="container">
      <!-- About Wrapper Start -->
      <div class="about-wrap">
        <div class="row">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <!-- About Image Wrap Start -->
            <div class="about-img-wrap">
              <img class="shape-1" data-aos="fade-up-right" data-aos-duration="500" src="{{ asset('cssUser/images/shape/about-shape2.png') }}" alt="">
              <div class="about-img" data-aos="fade-up-right" data-aos-duration="800">
                <img src="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}" alt="">
              </div>
              <div class="about-img about-img-2" data-aos="fade-up-right" data-aos-duration="500">
                <img src="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}" alt="">
              </div>
            </div>
            <!-- About Image Wrap End -->
          </div>
          <div class="col-lg-6">
            <!-- About Content Wrap Start -->
            <div class="about-content-wrap">
              <div class="section-title">
                <h3 class="sub-title" data-aos="fade-up-left" data-aos-duration="500">Kelas Industri</h3>
                <h2 class="title text-capitalize" data-aos="fade-up-left" data-aos-duration="700">Kami menyediakan layanan
                  kelas industri untuk SMK Negeri/Swasta</h2>
              </div>
              <p class="text" data-aos="fade-up-left" data-aos-duration="900">Materi yang diberikan kurikulum terbaru,
                pastinya sudah sesuai kebutuhan Industri, dan materi yang diberikan dibuat oleh Senior Developer dari
                HummaTech yang sudah berpengalaman didunia IT.</p>
              <!-- About List Start -->
              <div class="about-list-03">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="about-list-item-03" data-aos="fade-up-left" data-aos-duration="800">
                      <h3 class="title">Misi Kami</h3>
                      <p>Menyediakan Pendidikan Teknologi yang Mencerahkan Masa Depan</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- About List End -->
            </div>
            <!-- About Content Wrap End -->
          </div>
        </div>
      </div>
      <!-- About Wrapper End -->
    </div>
  </div>
  <!-- Kenapa Industri End -->


  <div class="section techwix-choose-us-section-02 section-padding-02" style="padding-bottom: 110px; padding-top: 100px; background-color: #ffffff">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="row">
          <div class="col-lg-6">
            <!-- Choose Us Left Start -->
            <div class="choose-us-left pendaftaran">
              <div class="section-title">
                <h3 class="sub-title" data-aos="fade-up-right" data-aos-duration="500">Pendaftaran kelas industri</h3>
                <h2 class="title text-capitalize" data-aos="fade-up-right" data-aos-duration="700">Dapatkan infomasi
                  terkait pendaftaran
                  kelas industri di sini</h2>
              </div>
              <p class="text mb-3" data-aos="fade-up-right" data-aos-duration="900">Kami menyediakan kesempatan untuk
                meningkatkan keterampilan dan pengetahuan dalam dunia teknologi. Kelas industri kami menawarkan kurikulum
                yang terkini dan diajarkan oleh para ahli industri yang berpengalaman.</p>
              <div data-aos="fade-up-right" class="btn-pendaftaran" data-aos-duration="1000"><a
                  href="https://class.hummatech.com/" target="_blank" class="btn btn-primary">Daftar</a></div>
            </div>
            <!-- Choose Us Left End -->
          </div>
          <div class="col-lg-6 syarat-ketentuan-margin">
            <h2 class="sub-title text-center" data-aos="fade-up-left" data-aos-duration="700">Syarat & Ketentuan</h2>
            <div class="content-container p-2" style=" max-height: 400px; overflow-y: auto" data-aos="fade-up-left" data-aos-duration="800">
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
  <div class="section techwix-service-section industry-index section-padding-02"
    style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Layanan Industri</h3>
          <h2 class="title text-capitalize" data-aos="fade-up" data-aos-duration="700">Tingkatkan Pengalaman Anda
            dengan Layanan
            Perusahaan Kami</h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="900">
          @if ($layananIndustri->count() > 0)
            <div class="row justify-content-center">
              @foreach ($layananIndustri as $key => $data)
                <div class="col-xl-3 col-sm-12">
                  <!-- Service Item Start -->
                  <div class="service-item layanan-industri-siswa">
                    <div class="service-content">
                      <div class="image-layanan">
                        <img style="width: 100%; height: 100%; object-fit: cover"
                          src="{{ asset('storage/layanan/' . $data->foto_layanan) }}" alt="">
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
          {{ $layananIndustri->links('pagination::simple-bootstrap-5') }}
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->

  <!-- Service Start -->
  <div class="section techwix-service-section section-padding-02" style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h2 class="title" data-aos="fade-up" data-aos-duration="700"
            style="padding: 20px; text-transform: capitalize">Institusi pendidikan yang mengikuti program kelas industri.
          </h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="1000">
          <div class="sekolah-logo-container row">
            @forelse ($Mous as $data)
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('storage/' . $data->foto_mou) }}" alt="MoU sekolah {{ $data->nama_mou }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>{{ $data->nama_mou }}</p>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-1.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-2.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-3.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-4.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-5.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-6.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-7.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-8.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-9.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-10.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-11.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
            @endforelse
          </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
          {{ $layananIndustri->links('pagination::simple-bootstrap-5') }}
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->

  <!-- Gallery Start -->
  <div class="section techwix-service-section section-padding-02" style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h2 class="title" data-aos="fade-up" data-aos-duration="700"
            style="padding: 20px; text-transform: capitalize">Gallery Kelas Industri
            <span style="color: #22B3E2">Humma</span>Tech
          </h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="1000">
          <div id="gallery" class="container-fluid">
            <ul id="lightgallery" class="list-unstyled">
              @forelse ($gallery as $data)
                <li class="gallery-item" data-responsive="{{ asset('storage/galery/' . $data->picture) }}"
                  data-src="{{ asset('storage/galery/' . $data->picture) }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('storage/galery/' . $data->picture) }}" class="img-responsive">
                  </a>
                </li>
              @empty
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_3.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_3.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_3.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_4.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_4.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_4.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_5.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_5.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_5.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_6.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_6.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_6.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_7.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_7.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_7.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_8.jpg') }}"
                  data-src="{{ asset('ImageGlobal/gallery/gallery_8.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_8.jpg') }}" class="img-responsive">
                  </a>
                </li>
              @endforelse
            </ul>
          </div>
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
