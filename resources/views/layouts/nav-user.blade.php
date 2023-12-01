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
            <a href="index.html"><img src="assets/images/logo.png" alt=""></a>
          </div>

          <div class="header-menu d-none d-lg-block">
            <ul class="main-menu">
              <li class="active-menu">
                <a href="index.html">Home</a>
                <ul class="sub-menu">
                  <li class="active"><a href="index.html">Home Main</a></li>
                  <li><a href="index-2.html">AI Solutions</a></li>
                  <li><a href="index-3.html">Cyber Security</a></li>
                  <li><a href="index-4.html">IT Solutions</a></li>
                  <li><a href="index-5.html">Software Company</a></li>
                  <li><a href="index-6.html">IT Agency</a></li>
                </ul>
              </li>
              <li>
                <a href="about.html">Aboute Us</a>
              </li>
              <li><a href="#">Pages</a>
                <ul class="sub-menu">
                  <li><a href="team.html">Our Team</a></li>
                  <li><a href="service.html">Service</a></li>
                  <li><a href="choose-us.html">Why Choose Us</a></li>
                  <li><a href="testimonial.html">Testimonial</a></li>
                  <li><a href="pricing.html">Pricing</a></li>
                  <li><a href="login-register.html">Login & Register</a></li>
                </ul>
              </li>
              <li><a href="#">Blog</a>
                <ul class="sub-menu">
                  <li><a href="blog.html">Blog Grid</a></li>
                  <li><a href="blog-standard.html">Blog List</a></li>
                  <li><a href="blog-details.html">Blog Single</a></li>
                </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
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
              <a class="btn" href="login-register.html">Get Started</a>
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

    @yield('content')
    <!-- back to top end -->

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
