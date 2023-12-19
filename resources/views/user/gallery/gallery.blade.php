@extends('layouts.nav-user')

<title>HummaTech - Gallery</title>

@section('header')
  <meta name="keywords" content="Gallery">
  <meta property="og:title" content="Gallery">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ request()->url() }}">
  <meta property="og:site_name" content="Gallery">
@endsection

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/pendidikan/style.css') }}">
  <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('cssUser/css/gallery/style.css') }}">
  <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <div class="section techwix-service-section section-padding-02" style="padding-bottom: 70px; padding-top: 120px">
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
                @forelse ($gallery as $data)
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
            {{-- @if ($gallery->count() > 16) --}}
            <div class="mt-5" style="padding: 0 12px">
              {{ $gallery->links('pagination::bootstrap-5') }}
            </div>
            {{-- @endif --}}
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
