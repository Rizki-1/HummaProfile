@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/style.css') }}">

  <div class="container-custome-header">
    <div class="custome-header">
      <div class="image">
        <img class="foto-slide active" src="{{ asset('ImageGlobal/lp-1.jpg') }}" class="d-block w-100" alt="...">
        <img class="foto-slide" src="{{ asset('ImageGlobal/lp-2.jpg') }}" class="d-block w-100" alt="...">
        <img class="foto-slide" src="{{ asset('ImageGlobal/lp-3.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="text">
        <h1 class="text-big">Humma<span>Tech</span></h1>
        <p class="text-small">Tempat dimana setiap tantangan Digital diselesaikan dengan Inovasi, Keahlian pengembangan, dan sentuhan kreatif desain yang membuat perbedaan.</p>
      </div>
      <div class="slider-foto">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div>
    </div>
  </div>

  <!-- About Start -->
  <div class="section techwix-about-section-04 section-padding tentang-kami" style="padding-top: 80px">
    <div class="shape-1"></div>
    <div class="container">
      <!-- About Wrapper Start -->
      <div class="about-wrap">
        <div class="row">
          <div class="col-lg-6">
            <!-- About Content Wrap Start -->
            <div class="about-content-wrap">
              <div class="section-title">
                <h3 class="sub-title" data-aos="fade-up-right" data-aos-duration="500">Tentang Kami</h3>
                <h2 class="title" data-aos="fade-up-right" data-aos-duration="600">Kami menyediakan berbagai layanan
                  Software yang dirancang untuk mendukung Perusahaan dan bisnis Anda.</h2>
              </div>
              @foreach ($profile as $data)
                <p class="text text-tentang" data-aos="fade-up-right" data-aos-duration="700">{{ $data->tentang }}</p>
              @endforeach
            </div>
            <!-- About Content Wrap End -->
          </div>
          <div class="col-lg-6">
            <!-- About Image Wrap Start -->
            <div class="about-img-wrap" data-aos="fade-up-left" data-aos-duration="500">
              <div class="about-img about-img-big">
                <img style="height: 540px" src="{{ asset('ImageGlobal/lp-3.jpg') }}" alt="">
              </div>
              <div class="about-img about-img-sm">
                <img style="width: 350px" src="{{ asset('ImageGlobal/lp-2.jpg') }}" alt="">
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
  <div class="section techwix-service-section-02 service-card-content section-padding layanan-index"
    style="background-color: #f8f8f8">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Layanan Perusahaan</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Kami menyediakan solusi Software yang
            benar-benar terkemuka.</h2>
        </div>
        @if ($layanan->count() > 0)
          <div class="service-content-wrap choose-us-content-wrap">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="900">
              @foreach ($layanan->take(4) as $key => $data)
                <div class="col-xl-3 col-sm-6">
                  <!-- Service Item Start -->
                  <div class="service-item">
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
            {{-- <div class="row" data-aos="fade-up" data-aos-duration="1000">
              <div class="col-lg-12">
                <div class="more-choose-content text-center">
                  <p>Lihat Selengkapnya <a href="{{ route('layananIndex') }}">Disini <i
                        class="fas fa-long-arrow-alt-right"></i></a>
                  </p>
                </div>
              </div>
            </div> --}}
          </div>
        @else
          <div class="nodata gap-3" data-aos="fade-up" data-aos-duration="1000">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
            <p>Data Layanan tidak tersedia</p>
          </div>
        @endif
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->

  <div class="section techwix-choose-us-section section-padding" style="padding-top: 50px">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Produk</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Produk yang kami hasilkan</h2>
        </div>
        @if ($produk->count() > 0)
          <div class="choose-us-content-wrap" data-aos="fade-up" data-aos-duration="900">
            <div class="row justify-content-center">
              @foreach ($produk->take(3) as $produkRow)
                <div class="col-lg-4 col-md-6">
                  <!-- Choose Us Item Start -->
                  <div class="choose-us-item">
                    <div class="choose-us-img">
                      <a href="{{ route('produk.detail', $produkRow->nama_produk) }}"><img class="picture-responsive"
                          src="{{ asset('storage/' . $produkRow->foto_produk) }}" alt="Foto Produk"></a>
                      <div class="choose-us-content">
                        <h3 class="title text-truncate">{{ $produkRow->nama_produk }}</h3>
                        <p class="description-truncate">{{ $produkRow->keterangan_produk }}</p>
                      </div>
                    </div>
                    <!-- Choose Us Item End -->
                  </div>
                </div>
              @endforeach
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="more-choose-content text-center" data-aos="fade-up" data-aos-duration="1000">
                  <p>Produk lainnya <a href="{{ route('produkIndex') }}">Disini <i
                        class="fas fa-long-arrow-alt-right"></i></a> </p>
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="nodata gap-3" data-aos="fade-up" data-aos-duration="1000">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
            <p>Data produk tidak tersedia</p>
          </div>
        @endif
      </div>
      <!-- Choose Us Wrap End -->
    </div>
  </div>

  <!-- Testimonial Start  -->
  <div class="section techwix-testimonial-section-02 techwix-testimonial-section-03 section-padding-02"
    style="padding: 60px 0;">
    <div class="container">
      <!-- Testimonial Wrap Start  -->
      <div class="testimonial-wrap-02">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Testimoni</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Pengalaman Lulusan Magang Kami</h2>
        </div>
        <div class="testimonial-content-wrap-02">
          <div class="swiper-container testimonial-02-active">
            <div class="swiper-wrapper">
              @forelse ($testimoni as $tm)
                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="900">
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
            <div class="swiper-pagination" data-aos="fade-up" data-aos-duration="500"></div>
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
      <div class="brand-wrapper text-center py-5" style="padding-top: 0px">
        <div class="section-title text-center mb-3">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Kerjasama Kelas Industri</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">MOU Dengan Sekolah</h2>
        </div>

        <!-- Brand Active Start -->
        <div class="brand-active d-flex justify-content-center mt-5" data-aos="fade-up" data-aos-duration="1000">
          <div class="scroller">
            <ul class="scroller__inner">
              @forelse ($Mous as $mou)
                <li>
                  <img src="{{ asset('storage/' . $mou->foto_mou) }}" alt="Mou sekolah {{ $mou->nama_mou }}">
                </li>
              @empty
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-1.png') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-2.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-3.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-4.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-5.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-6.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-7.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-8.png') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-9.png') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-10.jpg') }}" alt="">
                </li>
                <li>
                  <img src="{{ asset('cssUser/sekolah/smk-11.png') }}" alt="">
                </li>
              @endforelse
            </ul>
          </div>
        </div>
        <!-- Brand Active End -->
      </div>
      <!-- Brand Wrapper End -->
    </div>
  </div>
  <!-- Brand Logo End -->

  {{-- Berita Start --}}
  <div class="section techwix-blog-section section-padding-02" style="padding-top: 70px;"
    data-aos-anchor-placement="center-bottom">
    <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
        <h4 class="sub-title" data-aos="fade-up" data-aos-duration="500">Berita</h4>
        <h2 class="title" data-aos="fade-up" data-aos-duration="700">Berita terbaru terkait perusahaan kami</h2>
      </div>
      <!-- Section Title End -->
      @if ($berita->count() > 0)
        <div class="techwix-blog-wrap" data-aos="fade-up" data-aos-duration="900">
          <div class="row justify-content-center">
            @foreach ($berita->take(2) as $data)
              <div class="col-lg-4 col-md-6">
                <!-- Single Blog Start -->
                <div class="single-blog">
                  <div class="blog-image">
                    <a style="height: 250px; width: 100%" href="{{ route('detailBerita', $data->title) }}"><img
                        style="height: 100%; width: 100%; object-fit: cover;"
                        src="{{ asset('storage/' . $data->thumbnail) }}" alt="{{ $data->title }}"></a>
                    <div class="top-meta">
                      <span class="date">
                        <span>{{ \Carbon\Carbon::parse($data->created_at)->format('d') }}</span>
                        {{ Str::limit(\Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('MMMM'),3,'') }}
                      </span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta" style="display: flex; align-items: center;">
                      @foreach ($data->kategori->take(2) as $item)
                        <a href="{{ route('filter-category', $item->name) }}"
                          class="badge rounded-pill mb-1 text-truncate"
                          style="padding: 7px 13px; background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 13px ;margin-right: 5px; font-weight: 700; max-width: 37%">{{ $item->name }}</a>
                      @endforeach
                      @if ($data->kategori->count() > 2)
                        <a class="badge rounded-pill mb-1" style="color: black"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-more-horizontal">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                          </svg></a>
                      @endif
                    </div>
                    <h3 class="title"><a href="{{ route('detailBerita', $data->title) }}" class="text-truncate"
                        style="max-width: 100%">{{ $data->title }}</a></h3>
                    <div class="blog-btn">
                      <a class="blog-btn-link" href="{{ route('detailBerita', $data->title) }}">Selengkapnya <i
                          class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                  </div>
                </div>
                <!-- Single Blog End -->
              </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="custome-more-text text-center" style="margin-top: 30px">
                <p>Berita lainnya <a href="{{ route('beritaIndex') }}">Disini <i
                      class="fas fa-long-arrow-alt-right"></i></a> </p>
              </div>
            </div>
          </div>
        </div>
      @else
        <div class="nodata gap-3" data-aos="fade-up" data-aos-duration="1000">
          <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
          <p>Data Berita tidak tersedia</p>
        </div>
      @endif
    </div>
  </div>
  {{-- Berita End --}}

  <!-- Operasional Start -->
  <div class="section techwix-blog-section  section-padding-02" style="background-color: #f8f8f8">
    <div class="shape-1"></div>
    <div class="container">
      <!-- About Wrapper Start -->
      <div class="about-wrap">
        <div class="row">
          <div class="col-md-7 mb-5">
            <!-- About Content Wrap Start -->
            <div class="about-content-wrap">
              <div class="section-title">
                <h3 class="sub-title operational-holder" data-aos="fade-up-right" data-aos-duration="500">Waktu
                  Operasional</h3>
                <h2 class="title operational-holder mb-4" data-aos="fade-up-right" data-aos-duration="800">Waktu operasional
                  hummatech</h2>
              </div>
              @foreach ($operational as $sm)
                @if (\Carbon\Carbon::now()->locale('id')->isoFormat('dddd') == $sm->day)
                  @if ($sm->status == 0)
                    <p class="text text-tentang operational-holder" data-aos="fade-up-right" data-aos-duration="900">
                      {{ $sm->message }}</p>
                  @else
                    <p class="text text-tentang operational-holder" data-aos="fade-up-right" data-aos-duration="900">
                      Selamat datang di Hummatech! Kami senantiasa berkomitmen untuk memberikan pelayanan terbaik kepada
                      Anda. Untuk memastikan Anda mendapatkan
                      layanan yang optimal, berikut adalah informasi mengenai waktu operasional kami</p>
                  @endif
                @endif
              @endforeach
            </div>
            <!-- About Content Wrap End -->
          </div>
          <div class="col-md-5">
            <!-- About Image Wrap Start -->
            <div class="about-img-wrap" data-aos="fade-up-left" data-aos-duration="500">
              <div class="ot-container p-5">
                <div class="do-nothing">
                  @foreach ($operational as $ot)
                    <div class="d-flex">
                      <div
                        class="ot-day bolding @if ($ot->status == 0) deactivate @endif {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') == $ot->day? 'active': '' }}">
                        {{ Str::limit($ot->day, 6, '') }}</div>
                      <div class="ot-hours d-flex">
                        @if ($ot->status == 0)
                          <div
                            class="bolding deactivate {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') == $ot->day? '': '' }} text-center">
                            Tutup</div>
                        @else
                          <div
                            class="bolding {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') == $ot->day? 'active': '' }}">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $ot->open)->format('H:i') }}</div>
                          <div
                            class="bolding {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') == $ot->day? 'active': '' }}">
                            -</div>
                          <div
                            class="bolding {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') == $ot->day? 'active': '' }}">
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $ot->close)->format('H:i') }}</div>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- About Image Wrap End -->
          </div>
        </div>
      </div>
      <!-- About Wrapper End -->
    </div>
  </div>
  <!-- Operasional End -->

  <!-- Cabang Start -->
  <div class="section techwix-blog-section section-padding-02" style="background-color: #f8f8f8">
    <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
        <h4 class="sub-title" data-aos="fade-up" data-aos-duration="500">Cabang Kami</h4>
        <h2 class="title" data-aos="fade-up" data-aos-duration="700">Beberapa Cabang Dari PT HummaTech</h2>
      </div>
      <div class="container" data-aos="fade-up" data-aos-duration="900">
        <link rel="stylesheet" href="{{ asset('cssUser/css/leaflet.css') }}" />
        <div class="container-map">
          <div id="map" style="height: 400px;z-index: 1;"
            class="shadow-sm p-3 mb-5 bg-white rounded w-100 position-relative"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Cabang End -->

  <script>
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".foto-slide");
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

  <script src="{{ asset('cssUser/js/leaflet.js') }}"></script>
  <script>
    var map = L.map('map').setView([-7.900074, 112.606886], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    // Menggunakan gambar kustom sebagai ikon marker
    var customIcon = L.icon({
      iconUrl: '{{ asset('cssUser/css/images/marker-icon-2x.png') }}',
      iconSize: [36, 36],
      iconAnchor: [18, 36],
      popupAnchor: [0, -36]
    });

    @foreach ($cabang as $item)
      var cabangPerusahaan = L.marker([{{ $item->latitude }}, {{ $item->longitude }}], {
        icon: customIcon
      }).addTo(map);

      cabangPerusahaan.bindPopup('<b>{{ $item->name }}</b>');
    @endforeach

    var markerElements = document.querySelectorAll('.leaflet-marker-icon.leaflet-zoom-animated.leaflet-interactive');

    markerElements.forEach(function(element) {
      element.style.width = '36px';
      element.style.height = '36px';
    });

    const scrollers = document.querySelectorAll(".scroller");

    if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      tambahkanAnimasi();
    }

    function tambahkanAnimasi() {
      scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);

        const scrollerInner = scroller.querySelector(".scroller__inner");
        const scrollerContent = Array.from(scrollerInner.children);

        const totalWidth = scrollerContent.reduce(
          (acc, item) => acc + item.offsetWidth + 600,
          0
        );

        const durasiAnimasi = totalWidth / 50;

        scrollerInner.style.animationDuration = `${durasiAnimasi}s`;

        scrollerContent.forEach((item) => {
          const duplicateItem = item.cloneNode(true);
          duplicateItem.setAttribute("aria-hidden", true);
          scrollerInner.appendChild(duplicateItem);
        });
      });
    }
  </script>

  <script>
    function scrollTo(element, to, duration) {
      const start = element.scrollTop;
      const change = to - start;
      let currentTime = 0;
      const increment = 20;

      function animateScroll() {
        currentTime += increment;
        const val = Math.easeInOutQuad(currentTime, start, change, duration);
        element.scrollTop = val;
        if (currentTime < duration) {
          requestAnimationFrame(animateScroll);
        }
      }

      animateScroll();
    }

    // Fungsi easing untuk scroll
    Math.easeInOutQuad = function(t, b, c, d) {
      t /= d / 2;
      if (t < 1) return (c / 2) * t * t + b;
      t--;
      return (-c / 2) * (t * (t - 2) - 1) + b;
    };

    // Mendeteksi pergerakan scroll dan menerapkan efek paralaks
    document.addEventListener("scroll", function() {
      const scrollY = window.scrollY || window.pageYOffset;
      const parallaxContainer = document.querySelector(".parallax-scroll");

      if (parallaxContainer) {
        const translateYValue = scrollY * 0.2;
        parallaxContainer.style.transform = `translateY(${translateYValue}px)`;
      }
    });

    // Mendeteksi klik pada tautan dan mengaktifkan smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function(e) {
        e.preventDefault();

        const targetElement = document.querySelector(this.getAttribute("href"));
        if (targetElement) {
          scrollTo(document.documentElement, targetElement.offsetTop, 1000);
        }
      });
    });
  </script>
@endsection
