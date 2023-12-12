@extends('layouts.nav-user')

@section('header')
  <meta property="og:title" content="{{ $berita->title }}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ request()->url() }}">
  <meta property="og:image" content="{{ url('storage/' . $berita->thumbnail) }}">
  <meta property="og:site_name" content="Berita {{ $berita->title }} dari HummaTech">
  <meta property="article:published_time" content="{{ $berita->created_at->toIso8601String() }}">
  <meta property="article:modified_time" content="{{ $berita->updated_at->toIso8601String() }}">
  @foreach ($berita->kategori as $item)
    <meta property="article:section" content="{{ $item->name }}">
  @endforeach
  <meta property="article:author" content="HummaTech">
  <meta property="article:publisher" content="HummaTech">

  <!-- Tag OGP tambahan untuk SEO -->
  <meta name="keywords" content="Berita {{ $berita->title }}">
  <meta name="description" content="{{ Str::limit($berita->description, 160) }}">

  <title>Berita {{ $berita->title }}</title>
@endsection

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <!-- Blog Details Start -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
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
                <div class="blog-image" data-aos="fade-up" data-aos-duration="500">
                  <a style="width: 100%; height: 100%" href="{{ asset('storage/' . $berita->thumbnail) }}">
                    <img style="width: 100%;" src="{{ asset('storage/' . $berita->thumbnail) }}" alt="">
                  </a>
                </div>
                <div class="blog-content" data-aos="fade-up-right" data-aos-duration="500"
                  style="overflow-wrap: anywhere; overflow: hidden">
                  <div class="date-background-styling mb-3" data-aos="fade-up-right" data-aos-duration="500">
                    <span><i class="far fa-calendar-alt" style="margin-right: 10px"></i>Diposting pada
                      {{ \Carbon\Carbon::parse($berita->dibuat)->format('d') }}</span>
                    {{ Str::limit(\Carbon\Carbon::parse($berita->dibuat)->locale('id')->isoFormat('MMMM'),3,'') }}
                    {{ \Carbon\Carbon::parse($berita->dibuat)->format('Y') }}
                    </span>
                  </div>
                  <div class="blog-meta d-flex" data-aos="fade-up-right" data-aos-duration="700" style="flex-wrap: wrap;">
                    @foreach ($berita->kategori as $item)
                      <a href="{{ route('filter-category', $item->name) }}" class="badge rounded-pill mb-1"
                        style="padding: 7px 13px; background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 13px; margin-right: 5px; font-weight: 700">{{ $item->name }}</a>
                    @endforeach
                  </div>
                  <h3 class="title" style="overflow-wrap: anywhere; line-height: 42px;" data-aos="fade-up-right"
                    data-aos-duration="600">{{ $berita->title }}</h3>
                  <p class="text" data-aos="fade-up" data-aos-duration="900"
                    style="overflow-wrap: anywhere; line-height: 25px">{!! Str::markdown($berita->description) !!}</p>
                </div>
              </div>
              <!-- Single Blog End -->
            </div>
            <!-- Blog Details Post End -->
          </div>
          <div class="col-xl-3 col-lg-4">
            <!-- Blog Sidebar Start -->
            <div class="blog-sidebar">

              <!-- Sidebar Widget Start -->
              <div class="sidebar-widget">
                <!-- Widget Title Start -->
                <div class="widget-title">
                  <h3 class="title" data-aos="fade-up-left" data-aos-duration="500">Berita Lainnya</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Recent Post Start -->
                <div class="recent-posts" data-aos="fade-up-left" data-aos-duration="600">
                  <ul>
                    @foreach ($beritaRandom->take(5) as $data)
                      <li>
                        <a class="post-link" href="{{ route('detailBerita', $data->title) }}">
                          <div class="post-thumb">
                            <img style="object-fit: cover" src="{{ asset('storage/' . $data->thumbnail) }}"
                              alt="Foto Berita">
                          </div>
                          <div class="post-text">
                            <h4 class="title text-truncate detail-truncation">{{ $data->title }}</h4>
                            <span class="post-meta"><i
                                class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($data->created_at)->format('M d, Y') }}</span>
                          </div>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
                <!-- Widget Recent Post End -->
              </div>
              <!-- Sidebar Widget End -->

              <!-- Sidebar Widget Start -->
              <div class="sidebar-widget">
                <!-- Widget Title Start -->
                <div class="widget-title">
                  <h3 class="title" data-aos="fade-up-left" data-aos-duration="600">Kategori Berita</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Category Start -->
                <ul class="sidebar-tag" data-aos="fade-up-left" data-aos-duration="600">
                  @foreach ($kategoriBerita as $data)
                    <li><a href="{{ route('filter-category', $data->name) }}">{{ $data->name }}</a></li>
                  @endforeach
                </ul>
                <!-- Widget Category End -->
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
@endsection
