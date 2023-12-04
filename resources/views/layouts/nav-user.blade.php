<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">

  <title>Hummatech</title>

  <!-- Icon Font CSS -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/flaticon.css') }}">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/magnific-popup.css') }}">

  <!-- Main Style CSS -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/style.css') }}">
</head>


<body>

  <div class="main-wrapper">


    <!-- Preloader start -->
    {{-- <div id="preloader">
      <div class="preloader">
        <span></span>
        <span></span>
      </div>
    </div> --}}
    <!-- Preloader End -->

    <!-- Header Start  -->
    <div id="header" class="section header-section">

      <div class="container">

        <!-- Header Wrap Start  -->
        <div class="header-wrap">

          <div class="header-logo">
            <a href="{{ route('homeindex') }}"><img src="{{ asset('cssUser/images/logohumma.png') }}"
                alt="HummaTech"></a>
          </div>

          <div class="header-menu d-none d-lg-block">
            <ul class="main-menu">
              <li class="{{ request()->routeIs('homeindex') ? 'active-menu' : '' }}">
                <a href="/">Beranda</a>
              </li>
              <li
                class="{{ request()->routeIs('home.industriIndex') || request()->routeIs('home.siswaIndex') ? 'active-menu' : '' }}">
                <a href="#">Pendidikan</a>
                <ul class="sub-menu">
                  <li class="{{ request()->routeIs('home.siswaIndex') ? 'active' : '' }}"><a
                      href="{{ route('home.siswaIndex') }}">Magang/PKL</a></li>
                  <li class="{{ request()->routeIs('home.industriIndex') ? 'active' : '' }}"><a
                      href="{{ route('home.industriIndex') }}">Kelas Industri</a></li>
                </ul>
              </li>
              <li class="{{ request()->routeIs('produkIndex') ? 'active-menu' : '' }}">
                <a href="{{ route('produkIndex') }}">Produk Kami</a>
              </li>
              <li class="{{ request()->routeIs('contactIndex') ? 'active-menu' : '' }}">
                <a href="{{ route('contactIndex') }}">Hubungi</a>
              </li>
            </ul>
          </div>

          <!-- Header Meta Start -->
          <div class="header-meta">
            <!-- Header Search Start -->
            <div class="header-search">
              <a class="search-btn" href="#"><i class="flaticon-loupe"></i></a>
              <div class="search-wrap">
                <div class="search-inner">
                  <i id="search-close" class="flaticon-close search-close"></i>
                  <div class="search-cell">
                    <form action="#">
                      <div class="search-field-holder">
                        <input class="main-search-input" type="search" placeholder="Search Your Keyword...">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Header Search End -->
            <div class="header-btn d-none d-xl-block">
              <a class="btn" href="/login">Login</a>
            </div>
            <!-- Header Toggle Start -->
            <div class="header-toggle d-lg-none">
              <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
            <!-- Header Toggle End -->
          </div>
          <!-- Header Meta End  -->

        </div>
        <!-- Header Wrap End  -->

      </div>
    </div>
    <!-- Header End -->

    <!-- Offcanvas Start-->
    <div class="offcanvas offcanvas-start" id="offcanvasExample">
      <div class="offcanvas-header">
        <!-- Offcanvas Logo Start -->
        <div class="offcanvas-logo">
          <a href="index.html"><img src="assets/images/logo-white.png" alt=""></a>
        </div>
        <!-- Offcanvas Logo End -->
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas"><i class="flaticon-close"></i></button>
      </div>

      <!-- Offcanvas Body Start -->
      <div class="offcanvas-body">
        <div class="offcanvas-menu">
          <ul class="main-menu">
            <li class="{{ request()->routeIs('homeindex') ? 'active-menu' : '' }}">
              <a href="/">Beranda</a>
            </li>
            <li
              class="{{ request()->routeIs('home.industriIndex') || request()->routeIs('home.siswaIndex') ? 'active-menu' : '' }}">
              <a href="#">Pendidikan</a>
              <ul class="sub-menu">
                <li class="{{ request()->routeIs('home.siswaIndex') ? 'active' : '' }}"><a
                    href="{{ route('home.siswaIndex') }}">Magang/PKL</a></li>
                <li class="{{ request()->routeIs('home.industriIndex') ? 'active' : '' }}"><a
                    href="{{ route('home.industriIndex') }}">Kelas Industri</a></li>
              </ul>
            </li>
            <li class="{{ request()->routeIs('produkIndex') ? 'active-menu' : '' }}">
              <a href="{{ route('produkIndex') }}">Produk Kami</a>
            </li>
            <li class="{{ request()->routeIs('contactIndex') ? 'active-menu' : '' }}">
              <a href="{{ route('contactIndex') }}">Hubungi</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Offcanvas Body End -->
    </div>
    <!-- Offcanvas End -->

    @yield('content')
    <!-- back to top end -->

    <!-- Footer Section Start -->
    <div class="section footer-section footer-section-04"
      style="background-image: url({{ asset('cssUser/images/bg/footer-bg3.jpg') }});">

      <div class="container">
        <!-- Footer Widget Wrap Start -->
        <div class="footer-widget-wrap">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget-about">
                <a class="footer-logo" href="{{ route('homeindex') }}"><img
                    src="{{ asset('cssUser/images/logohumma.png') }}" alt="Logo"></a>
                <p>Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of
                  incredible freelance talent.</p>
              </div>
              <!-- Footer Widget End -->
            </div>
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget">
                <h4 class="footer-widget-title">Sosial Media</h4>

                <div class="widget-link">
                  <ul class="link">
                    @foreach ($sosmed as $data)
                      <li><a class="text-capitalize" href="{{ $data->link }}">{{ $data->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- Footer Widget End -->
            </div>
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget">
                <h4 class="footer-widget-title">Layanan Kami</h4>

                <div class="widget-link">
                  <ul class="link">
                    <li><a href="#">Data Security</a></li>
                    <li><a href="#">IT Managment</a></li>
                    <li><a href="#">Outsourcing</a></li>
                    <li><a href="#">Networking</a></li>
                  </ul>
                </div>
              </div>
              <!-- Footer Widget End -->
            </div>
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget">
                <h4 class="footer-widget-title">Hubungi Kami</h4>

                <div class="widget-info">
                  @foreach ($profile as $data)
                    <ul>
                      <li>
                        <div class="info-icon">
                          <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="info-text">
                          <span><a href="#">{{ $data->no_telp }}</a></span>
                        </div>
                      </li>
                      <li>
                        <div class="info-icon">
                          <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="info-text">
                          <span><a href="#">{{ $data->email }}</a></span>
                        </div>
                      </li>
                      <li>
                        <div class="info-icon">
                          <i class="flaticon-pin"></i>
                        </div>
                        <div class="info-text">
                          <span>{{ $data->alamat }}</span>
                        </div>
                      </li>
                    </ul>
                  @endforeach
                </div>
              </div>
              <!-- Footer Widget End -->
            </div>
          </div>
        </div>
        <!-- Footer Widget Wrap End -->
      </div>

      <!-- Footer Copyright Start -->
      <div class="footer-copyright-area">
        <div class="container">
          <div class="footer-copyright-wrap">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <!-- Footer Copyright Text Start -->
                <div class="copyright-text text-center">
                  <p>© Copyrights 2023 HummaTech All rights reserved. </p>
                </div>
                <!-- Footer Copyright Text End -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Copyright End -->
    </div>
    <!-- Footer Section End -->

    <!-- back to top start -->
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
  </div>

  <!-- JS
    ============================================ -->
  <script src="{{ asset('cssUser/js/vendor/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/vendor/modernizr-3.11.2.min.js') }}"></script>

  <!-- Bootstrap JS -->
  <script src="{{ asset('cssUser/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/plugins/bootstrap.min.js') }}"></script>

  <!-- Plugins JS -->
  <script src="{{ asset('cssUser/js/plugins/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/plugins/aos.j') }}s"></script>
  <script src="{{ asset('cssUser/js/plugins/waypoints.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/plugins/back-to-top.js') }}"></script>
  <script src="{{ asset('cssUser/js/plugins/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/plugins/appear.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/plugins/jquery.magnific-popup.min.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('cssUser/js/main.js') }}"></script>

</body>

</html>
