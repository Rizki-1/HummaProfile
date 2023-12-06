@extends('layouts.nav-user')

@section('content')

<style>
  #carouselExampleSlidesOnly {
    overflow: hidden;
    position: relative;
  }

  .carousel-inner {
    display: flex;
    height: 100vh;
    transition: transform 0.5s ease;
  }

  .carousel-item {
    width: 100%;
    height: 100%;
    flex: 0 0 auto;
  }

  .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .parallax-scroll {
    transform: translateY(0);
    transition: transform 0.4s ease; /* Efek transisi untuk membuat pergerakan lebih halus */
  }

  /* Penyesuaian agar gambar tetap di dalam batas */
  .parallax-scroll .carousel-item {
    transform: translateY(-0%);
  }
</style>


<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner parallax-scroll">
    <div class="carousel-item active">
      <img src="{{ asset('ImageGlobal/lp-2.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('ImageGlobal/lp-1.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('ImageGlobal/lp-3.jpg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<script>
  // Fungsi untuk menangani smooth scroll
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
  Math.easeInOutQuad = function (t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  };

  // Mendeteksi pergerakan scroll dan menerapkan efek paralaks
  document.addEventListener("scroll", function () {
    const scrollY = window.scrollY || window.pageYOffset;
    const parallaxContainer = document.querySelector(".parallax-scroll");

    if (parallaxContainer) {
      const translateYValue = scrollY * 0.5;
      parallaxContainer.style.transform = `translateY(${translateYValue}px)`;
    }
  });

  // Mendeteksi klik pada tautan dan mengaktifkan smooth scroll
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();

      const targetElement = document.querySelector(this.getAttribute("href"));
      if (targetElement) {
        scrollTo(document.documentElement, targetElement.offsetTop, 1000);
      }
    });
  });
</script>

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
                <h2 class="title">Kami menyediakan berbagai layanan Software yang dirancang untuk mendukung Perusahaan dan bisnis Anda.
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
  <div class="section techwix-service-section-02 service-card-content section-padding" style="background-image: url(cssUser/images/bg/service-bg.jpg);">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title">Layanan Perusahaan</h3>
          <h2 class="title">Kami menyediakan solusi Perangkat Lunak yang benar-benar terkemuka.</h2>
        </div>
        <div class="service-content-wrap choose-us-content-wrap">
          <div class="row">
            @foreach ($layanan->take(4) as $key => $data)
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
          <div class="row">
            <div class="col-lg-12">
              <div class="more-choose-content text-center">
                <p>Lihat Selengkapnya <a href="{{ route('layananIndex') }}">Disini <i class="fas fa-long-arrow-alt-right"></i></a>
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

  <div class="section techwix-choose-us-section section-padding" style="padding-top: 100px">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title">Produk</h3>
          <h2 class="title">Produk yang kami hasilkan</h2>
        </div>
        <div class="choose-us-content-wrap">
          <div class="row justify-content-center">
            @foreach ($produk->take(3) as $produkRow)
              <div class="col-lg-4 col-md-6">
                <!-- Choose Us Item Start -->
                <div class="choose-us-item">
                  <div class="choose-us-img">
                    <a href="#"><img class="picture-responsive" src="{{ asset('storage/' . $produkRow->foto_produk) }}" alt="Foto Produk"></a>
                    <div class="choose-us-content">
                      <h3 class="title text-truncate">{{ $produkRow->nama_produk }}</h3>
                      <p class="description-truncate">{{ $produkRow->keterangan_produk }}</p>
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
                <p>Produk lainnya <a href="{{ route('produkIndex') }}">Disini <i class="fas fa-long-arrow-alt-right"></i></a> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Choose Us Wrap End -->
    </div>
  </div>

  <!-- Testimonial Start  -->
  <div class="section techwix-testimonial-section-02 techwix-testimonial-section-03 section-padding-02" style="padding: 60px 0;">
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
              @forelse ($testimoni as $tm)
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
                      <span class="name d-inline-block text-truncate" style="max-width: 40%">{{ $tm->nama }} </span>
                      <span class="designation d-inline-block text-truncate" style="max-width: 40%">/ {{ $tm->asal_sekolah }}</span>
                    </div>
                  </div>
                  <!--  Single Testimonial End  -->
                </div>
              @empty
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

  <!-- Brand Logo Start -->
  <div class="section techwix-brand-section techwix-brand-section-03">
    <div class="container">
      <!-- Brand Wrapper Start -->
      <div class="brand-wrapper text-center py-5" style="padding-top: 0px">
        <div class="section-title text-center mb-3">
          <h3 class="sub-title">Kerjasama Kelas Industri</h3>
          <h2 class="title">MOU Dengan Sekolah</h2>
        </div>

        <!-- Brand Active Start -->
        <div class="brand-active d-flex justify-content-center mt-5">
          <div class="scroller">
            <ul class="scroller__inner">
              @forelse ($Mous as $mou)
                <li>
                  <img src="{{ asset('storage/Mou/' . $mou->foto_mou) }}" alt="" srcset="">
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
  <div class="section techwix-blog-section section-padding-02" style="background-color: #f4f4f4; padding-top: 70px;">
    <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
        <h4 class="sub-title">Berita</h4>
        <h2 class="title">Berita terbaru terkait perusahaan kami</h2>
      </div>
      <!-- Section Title End -->
      <div class="techwix-blog-wrap">
        <div class="row justify-content-center">
          @foreach ($berita->take(3) as $data)
            <div class="col-lg-4 col-md-6">
              <!-- Single Blog Start -->
              <div class="single-blog">
                <div class="blog-image">
                  <a style="height: 250px; width: 100%" href=""><img style="height: 100%; width: 100%; object-fit: cover;" src="{{ asset('storage/' . $data->thumbnail) }}" alt="{{ $data->title }}"></a>
                  <div class="top-meta">
                    <span class="date">
                      <span>{{ \Carbon\Carbon::parse($data->created_at)->format('d') }}</span>
                      {{ \Carbon\Carbon::parse($data->created_at)->format('M') }}
                    </span>
                  </div>
                </div>
                <div class="blog-content">
                  <div class="blog-meta">
                    @foreach ($data->kategori as $item)
                      <a href="{{ route('filter-category', $item->id) }}" class="badge rounded-pill mb-1" style="background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 12px;margin-right: 5px">{{ $item->name }}</a>
                    @endforeach
                  </div>
                  <h3 class="title"><a href="">{{ $data->title }}</a></h3>
                  <div class="blog-btn">
                    <a class="blog-btn-link" href="{{ route('detailBerita', $data->id) }}">Read Full <i class="fas fa-long-arrow-alt-right"></i></a>
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
              <p>Berita lainnya <a href="{{ route('beritaIndex') }}">Disini <i class="fas fa-long-arrow-alt-right"></i></a> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Berita End --}}

  <!-- Blog Start -->
  <div class="section techwix-blog-section section-padding-02">
    <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
        <h4 class="sub-title">Cabang Kami</h4>
        <h2 class="title">Beberapa Cabang Dari PT HummaTech</h2>
      </div>
      <div class="container">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <div class="container-map">
          <div id="map" style="height: 400px;z-index: 1;" class="shadow-sm p-3 mb-5 bg-white rounded w-100 position-relative"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Blog End -->

  <script src="{{ asset('cssUser/js/leaflet.js') }}"></script>
  <script>
    var map = L.map('map').setView([-7.900074, 112.606886], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Koordinat kantor pusat
    var kantorPusat = L.marker([-7.900074, 112.606886]).addTo(map);
    kantorPusat.bindPopup('<b>Kantor Pusat</b>').openPopup();

    // Koordinat cabang 1
    var cabang1 = L.marker([-7.5570422, 111.6597938]).addTo(map);
    cabang1.bindPopup('<b>Cabang 1</b>');

    // Koordinat cabang 2
    var cabang2 = L.marker([-7.5573993, 111.5791793]).addTo(map);
    cabang2.bindPopup('<b>Cabang 2</b>');

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
          (acc, item) => acc + item.offsetWidth + 40,
          0
        );

        const durasiAnimasi = totalWidth / 20;

        scrollerInner.style.animationDuration = `${durasiAnimasi}s`;

        scrollerContent.forEach((item) => {
          const duplicateItem = item.cloneNode(true);
          duplicateItem.setAttribute("aria-hidden", true);
          scrollerInner.appendChild(duplicateItem);
        });
      });
    }
  </script>
@endsection
