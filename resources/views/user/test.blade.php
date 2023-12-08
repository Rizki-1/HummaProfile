{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('cssUser/css/plugins/bootstrap.min.css') }}">
<script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LightGallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #152836
        }

        h2 {
            color: #fff;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 100;
        }

        body {
            background-color: #152836
        }

        h2 {
            color: #fff;
            margin-bottom: 40px;
            text-align: center;
            font-weight: 100;
        }

        .demo-gallery>ul {
            margin-bottom: 0;
        }

        .demo-gallery>ul>li {
            float: left;
            height: max-content;
            width: 200px;
        }

        .demo-gallery>ul>li a {
            border: 3px solid #FFF;
            border-radius: 3px;
            display: block;
            overflow: hidden;
            position: relative;
            float: left;
        }

        .demo-gallery>ul>li a>img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery>ul>li a:hover>img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery>ul>li a:hover .demo-gallery-poster>img {
            opacity: 1;
        }

        .demo-gallery>ul>li a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery>ul>li a .demo-gallery-poster>img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery>ul>li a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .justified-gallery>a>img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery .justified-gallery>a:hover>img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery .justified-gallery>a:hover .demo-gallery-poster>img {
            opacity: 1;
        }

        .demo-gallery .justified-gallery>a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery .justified-gallery>a .demo-gallery-poster>img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery .justified-gallery>a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .video .demo-gallery-poster img {
            height: 48px;
            margin-left: -24px;
            margin-top: -24px;
            opacity: 0.8;
            width: 48px;
        }

        .demo-gallery.dark>ul>li a {
            border: 3px solid #04070a;
        }

        .home .demo-gallery {
            padding-bottom: 80px;
        }

        /* Skeleton */
        #lightgallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery-item {
            position: relative;
            width: 100%;
        }

        .skeleton {
            position: absolute;
            background-color: #e2e5e7;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .skeleton::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: -40px;
            width: 40px;
            height: 100%;
            background: linear-gradient(90deg,
                    rgba(255, 255, 255, 0),
                    rgba(255, 255, 255, 0.5),
                    rgba(255, 255, 255, 0));
            animation: shine 1s linear infinite;
        }

        @keyframes shine {
            to {
                left: 100%;
                /* Adjust the final position based on your needs */
            }
        }
    </style>
</head>

<body class="home">
    <div class="container" style="margin-top:40px;">
        <h2>Jquery LightGallery</h2>
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled">
                <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2 gallery-item"
                    data-responsive="https://sachinchoolur.github.io/lightgallery.js/static/img/1-1600.jpg"
                    data-src="https://sachinchoolur.github.io/lightgallery.js/static/img/1-1600.jpg">
                    <div class="skeleton"></div>
                    <a href="" class="opacity-0">
                        <img class="img-responsive" src="{{ asset('ImageGlobal/lp-3.jpg') }}">
                    </a>
                </li>
            </ul>
        </div>
    </div>
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

                    }, 2000);
                    replaceSkeletonWithImage(skeleton, imageSource);
                });
            });
            $('#lightgallery').lightGallery();
        });
    </script>
</body>

</html> --}}


{{-- Gallery --}}
{{-- <link rel="stylesheet" href="{{ asset('cssUser/css/gallery/lightgallery.min.css') }}"> --}}
<link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
          <link rel="stylesheet" href="{{ asset('cssUser/css/gallery/style.css') }}">
          <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>
          <link rel="stylesheet" href="{{ asset('cssUser/css/plugins/bootstrap.min.css') }}">
          <body class="home">
          <div class="container" style="margin-top:40px;">
          <div class="demo-gallery">
          <div id="gallery" class="container-fluid">
            <ul id="lightgallery" class="list-unstyled">
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_1.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_2.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_3.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_3.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_3.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_4.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_4.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_4.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_5.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_5.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_5.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_6.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_6.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_6.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_7.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_7.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_7.jpg') }}" class="img-responsive">
                  </a>
                </li>
                <li class="gallery-item" data-responsive="{{ asset('ImageGlobal/gallery/gallery_8.jpg') }}" data-src="{{ asset('ImageGlobal/gallery/gallery_8.jpg') }}">
                  <div class="skeleton"></div>
                  <a href="" class="opacity-0">
                    <img src="{{ asset('ImageGlobal/gallery/gallery_8.jpg') }}" class="img-responsive">
                  </a>
                </li>
            </ul>
          </div>
          </div>
          </div>

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
              </body>
          {{-- End Gallery --}}
