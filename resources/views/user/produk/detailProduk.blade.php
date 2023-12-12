@extends('layouts.nav-user')
<title>HummaTech - Detail Produk</title>
@section('content')
  <!-- Blog Details Start -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/berita-produk/style.css') }}">
  <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('cssUser/css/gallery/style.css') }}">
  <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>

  <div class="section blog-details-section section-padding-02 mb-5">
    <div class="container">
      <!-- Blog Details Wrap Start -->
      <div class="blog-details-wrap">
        <div class="row">
          <div class="col-xl-8 col-lg-8">
            <!-- Blog Details Post Start -->
            <div class="blog-details-post">
              <!-- Single Blog Start -->
              <div class="single-blog-post single-blog">
                <div class="blog-image" data-aos="fade-up-right" data-aos-duration="500">
                  <div id="carouselExample" class="carousel slide">
                    <ul class="carousel-inner list-unstyled" id="lightgallery">
                      <li class="carousel-item active gallery-item"
                        data-responsive="{{ asset('/storage/' . $produk->foto_produk) }}"
                        data-src="{{ asset('/storage/' . $produk->foto_produk) }}">
                        <a href="">
                          <img src="{{ asset('/storage/' . $produk->foto_produk) }}" class="d-block w-100"
                            alt="Foto Produk {{ $produk->nama_produk }}">
                        </a>
                      </li>
                      @foreach ($produk->galery as $i => $item)
                        <li class="carousel-item gallery-item"
                          data-responsive="{{ asset('/storage/produk_galery/' . $item->galery) }}"
                          data-src="{{ asset('/storage/produk_galery/' . $item->galery) }}">
                          <a href="">
                            <img src="{{ asset('/storage/produk_galery/' . $item->galery) }}" class="d-block w-100"
                              alt="Lampiran produk {{ $i++ }}">
                          </a>
                        </li>
                      @endforeach
                    </ul>
                    @if (count($produk->galery) > 1)
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    @endif
                  </div>
                </div>
                <div class="blog-content">
                  <div class="date-background-styling" data-aos="fade-up-right" data-aos-duration="500">
                    <span><i class="far fa-calendar-alt" style="margin-right: 10px"></i>Tanggal Rilis</span>
                    {{ \Carbon\Carbon::parse($produk->dibuat)->format('d') }}
                    {{ \Carbon\Carbon::parse($produk->dibuat)->locale('id')->isoFormat('MMMM') }}
                    {{ \Carbon\Carbon::parse($produk->dibuat)->format('Y') }}
                    </span>
                  </div>
                  <h3 class="title" data-aos="fade-up-right" data-aos-duration="500" style="overflow-wrap: anywhere; line-height: 42px;">{{ $produk->nama_produk }}</h3>
                  <div data-aos="fade-up-right" data-aos-duration="500">
                    <p class="text" data-aos="fade-up" data-aos-duration="900"
                      style="overflow-wrap: anywhere; line-height: 25px">{!! Str::markdown($produk->keterangan_produk) !!}</p>
                  </div>
                </div>
              </div>
              <!-- Single Blog End -->
            </div>
            <!-- Blog Details Post End -->
          </div>
          <div class="col-xl-4 col-lg-4">
            <!-- Blog Sidebar Start -->
            <div class="blog-sidebar">

              <!-- Sidebar Widget Start -->
              <div class="sidebar-widget">
                <!-- Widget Title Start -->
                <div class="widget-title">
                  <h3 class="title" data-aos="fade-up-left" data-aos-duration="500">Produk Lainnya</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Recent Post Start -->
                <div class="recent-posts" data-aos="fade-up-left" data-aos-duration="600">
                  <ul>
                    @forelse ($produkLainnya->take(5) as $data)
                      <li>
                        <a class="post-link" href="{{ route('produk.detail', $data->nama_produk) }}">
                          <div class="post-thumb">
                            <img style="object-fit: cover" src="{{ asset('storage/' . $data->foto_produk) }}"
                              alt="">
                          </div>
                          <div class="post-text">
                            <h4 class="title text-truncate detail-truncation">{{ $data->nama_produk }}</h4>
                            <span class="post-meta"><i class="far fa-calendar-alt"></i>
                              {{ \Carbon\Carbon::parse($produk->dibuat)->format('d') }}
                              {{ Str::limit(\Carbon\Carbon::parse($produk->dibuat)->locale('id')->isoFormat('MMMM'),3,'') }}
                              {{ \Carbon\Carbon::parse($produk->dibuat)->format('Y') }}
                            </span>
                          </div>
                        </a>
                      </li>
                    @empty
                      <div class="nodata gap-3" data-aos="fade-up" data-aos-duration="600">
                        <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
                        <p>Produk lainnya tidak tersedia</p>
                      </div>
                    @endforelse
                  </ul>
                </div>
                <!-- Widget Recent Post End -->
              </div>
              <!-- Sidebar Widget End -->
            </div>
            <!-- Blog Sidebar End -->
          </div>
        </div>
      </div>
      <!-- Blog Details Wrap End -->
    </div>
  </div>
  <!-- Blog Details End -->
  <script src="{{ asset('js/galleryFunction.js') }}"></script>

  <script>
    $('#lightgallery').lightGallery();
  </script>
@endsection

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
