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
            <a href="{{ route('homeindex') }}"><img src="{{ asset('cssUser/images/logo.png') }}" alt=""></a>
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
              <li>
                <a href="#">Hubungi</a>
              </li>
            </ul>
          </div>

          <!-- Header Meta Start -->
          <div class="header-meta">
            <!-- Header Cart Start -->
            <div class="header-cart dropdown">
              <button class="cart-btn" data-bs-toggle="dropdown">
                <i class="flaticon-shopping-cart"></i>
                <span class="count">0</span>
              </button>
              <!-- Header Dropdown Cart Start -->
              <div class="dropdown-menu dropdown-cart">
                <!-- Dropdown Cart Items Start -->
                <div class="cart-items">
                  <!-- Single Cart Item Start -->
                  <div class="single-cart-item">
                    <div class="item-image">
                      <img src="assets/images/shop-cart-1.jpg" alt="cart">
                    </div>
                    <div class="item-content">
                      <h4 class="title"><a href="#">Apple Iphone X</a></h4>
                      <span class="quantity">2 x $59.99</span>
                    </div>
                    <button class="btn-close"></button>
                  </div>
                  <!-- Single Cart Item End -->
                  <!-- Single Cart Item Start -->
                  <div class="single-cart-item">
                    <div class="item-image">
                      <img src="assets/images/shop-cart-2.jpg" alt="cart">
                    </div>
                    <div class="item-content">
                      <h4 class="title"><a href="#">Sony Xperia Tablet</a></h4>
                      <span class="quantity">2 x $59.99</span>
                    </div>
                    <button class="btn-close"></button>
                  </div>
                  <!-- Single Cart Item End -->
                  <!-- Single Cart Item Start -->
                  <div class="single-cart-item">
                    <div class="item-image">
                      <img src="assets/images/shop-cart-3.jpg" alt="cart">
                    </div>
                    <div class="item-content">
                      <h4 class="title"><a href="#">Camera Digital</a></h4>
                      <span class="quantity">2 x $59.99</span>
                    </div>
                    <button class="btn-close"></button>
                  </div>
                  <!-- Single Cart Item End -->
                </div>
                <!-- Dropdown Cart Items End -->
                <!-- Dropdown Cart Total Start -->
                <div class="cart-total">
                  <span class="label">Subtotal:</span>
                  <span class="value">0</span>
                </div>
                <!-- Dropdown Cart Total End -->
                <!-- Dropdown Cart Button Start -->
                <div class="cart-btns">
                  <a class="btn" href="#">View Cart</a>
                  <a class="btn btn-2" href="#">Checkout</a>
                </div>
                <!-- Dropdown Cart Button End -->
              </div>
              <!-- Header Dropdown Cart End -->
            </div>
            <!-- Header Cart End -->
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
            <li>
              <a href="#">Hubungi</a>
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
    <div class="section footer-section footer-section-03"
      style="background-image: url({{ asset('cssUser/images/bg/footer-bg') }}.jpg);">

      <div class="container">
        <!-- Footer Widget Wrap Start -->
        <div class="footer-widget-wrap">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget-about">
                <a class="footer-logo" href="index.html"><img src="{{ asset('cssUser/images/logo-white.png') }}"
                    alt="Logo"></a>
                <p>Accelerate innovation with world-class tech teams We’ll match you to an entire remote team of
                  incredible freelance talent.</p>
                <div class="footer-social">
                  <ul class="social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                  </ul>
                </div>
              </div>
              <!-- Footer Widget End -->
            </div>
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget">
                <h4 class="footer-widget-title">Useful Links</h4>

                <div class="widget-link">
                  <ul class="link">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">About Company</a></li>
                    <li><a href="#">Payment Gatway</a></li>
                    <li><a href="#">Policy</a></li>
                  </ul>
                </div>
              </div>
              <!-- Footer Widget End -->
            </div>
            <div class="col-lg-3 col-sm-6">
              <!-- Footer Widget Start -->
              <div class="footer-widget">
                <h4 class="footer-widget-title">Our Services</h4>

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
                <h4 class="footer-widget-title">Contact Information</h4>

                <div class="widget-info">
                  <ul>
                    <li>
                      <div class="info-icon">
                        <i class="flaticon-phone-call"></i>
                      </div>
                      <div class="info-text">
                        <span><a href="#">+91 458 654 528</a></span>
                      </div>
                    </li>
                    <li>
                      <div class="info-icon">
                        <i class="far fa-envelope-open"></i>
                      </div>
                      <div class="info-text">
                        <span><a href="#">info@example.com</a></span>
                      </div>
                    </li>
                    <li>
                      <div class="info-icon">
                        <i class="flaticon-pin"></i>
                      </div>
                      <div class="info-text">
                        <span>60 East 65th Street, NY</span>
                      </div>
                    </li>
                  </ul>
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
                  <p>© Copyrights 2022 techwix All rights reserved. </p>
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
