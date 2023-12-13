@extends('layouts.nav-user')

@section('header')
    <meta property="og:title" content="Kategori-kategori berita HummaTech">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="Kategori berita {{ $nameKategori }}">
    <meta property="article:section" content="{{ $nameKategori }}">
    <meta property="article:author" content="HummaTech">
    <meta property="article:publisher" content="HummaTech">

    <!-- Tag OGP tambahan untuk SEO -->
    <meta name="keywords" content="Kategori berita {{ $nameKategori }}">
    <meta name="description" content="Temukan berita terkini dalam kategori {{ $nameKategori }}. Dapatkan informasi terbaru, artikel, dan liputan khusus. Jelajahi sekarang untuk mendapatkan wawasan yang lebih baik.">

    <title>Kategori berita {{ $nameKategori }}</title>
@endsection

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <div class="section techwix-blog-grid-section section-padding" style="background-color: #f8f8f8;">
    <div class="container">
      <div class="techwix-blog-grid-wrap">
        <div class="section-title text-center mb-4 mt-4">
            <div class="section-title text-center mb-3">
                <h3 class="sub-title m-0" data-aos="fade-up" data-aos-duration="500">Kategori Berita</h3>
                <h2 class="title" data-aos="fade-up" data-aos-duration="700">{{$nameKategori}}</h2>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="900">
          @forelse ($beritas as $berita)
          <div class="col-lg-4 col-md-6">
            <!-- Single Blog Start -->
            <div class="single-blog">
              <div class="blog-image">
                <a style="height: 250px; width: 100%" href="{{ route('detailBerita', $berita->berita->title) }}"><img style="height: 100%; width: 100%; object-fit: cover;" src="{{ asset('storage/' . $berita->berita->thumbnail) }}"
                    alt="{{ $berita->berita->title }}"></a>
                <div class="top-meta">
                  <span class="date">
                    <span>{{ \Carbon\Carbon::parse($berita->berita->created_at)->format('d') }}</span>
                    {{ Str::limit(\Carbon\Carbon::parse($berita->berita->created_at)->locale('id')->isoFormat('MMMM'),3,'') }}
                  </span>
                </div>
              </div>
              <div class="blog-content">
                <div class="blog-meta" style="display: flex; align-items: center;">
                  @foreach ($berita->berita->kategori->take(2) as $item)
                  <a href="{{ route('filter-category', $item->name) }}" class="badge rounded-pill mb-1 text-truncate"
                      style="padding: 7px 13px; background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 13px ;margin-right: 5px; font-weight: 700; max-width: 37%">{{ $item->name }}</a>
                  @endforeach
                  @if ($berita->berita->kategori->count() > 2)
                    <a class="badge rounded-pill mb-1" style="color: black"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                      </svg></a>
                  @endif
                </div>
                <h3 class="title"><a class="text-truncate" style="max-width: 100%;" href="{{ route('detailBerita', $berita->berita->title) }}">{{ $berita->berita->title }}</a></h3>
                <div class="blog-btn">
                  <a class="blog-btn-link" href="{{ route('detailBerita', $berita->berita->title) }}">Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
            </div>
            <!-- Single Blog End -->
          </div>
          @empty
          <div class="nodata gap-2 text-center">
            <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="" style="width: 200px">
            <p>Tidak ada data berita</p>
          </div>
          @endforelse
        </div>
        <div class="mt-4">
          <!-- Page Pagination Start -->
          {{ $beritas->links('pagination::bootstrap-5') }}
          <!-- Page Pagination End -->
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="section mb-5">
    <div class="container d-flex justify-content-center">
      <div class="sidebar-widget">
        <div class="widget-title text-center">
          <h3 class="title" data-aos="fade-up" data-aos-duration="500">Kategori Berita</h3>
        </div>
        <ul class="sidebar-tag" data-aos="fade-up" data-aos-duration="600">
          @foreach ($kategori as $data)
            <li><a href="{{ route('filter-category', $data->name) }}">{{ $data->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
