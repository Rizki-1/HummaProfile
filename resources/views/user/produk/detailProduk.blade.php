@extends('layouts.nav-user')

@section('content')
  <!-- Blog Details Start -->
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
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
                  <a href="{{ $produk->link }}" target="_blank" style="width: 100%; height: 100%"><img style="width: 100%;" src="{{ asset('storage/' . $produk->foto_produk) }}" alt=""></a>
                </div>
                <div class="blog-content">
                  <div class="date-background-styling" data-aos="fade-up" data-aos-duration="500">
                    <span><i class="far fa-calendar-alt" style="margin-right: 10px"></i>Release date {{ \Carbon\Carbon::parse($produk->dibuat)->format('d') }}</span>
                    {{ \Carbon\Carbon::parse($produk->dibuat)->format('M') }}
                    {{ \Carbon\Carbon::parse($produk->dibuat)->format('Y') }}
                    </span>
                  </div>
                  <h3 class="title" data-aos="fade-up" data-aos-duration="700" style="overflow-wrap: anywhere; line-height: 42px;">{{ $produk->nama_produk }}</h3>
                  <p class="text" data-aos="fade-up" data-aos-duration="900" style="overflow-wrap: anywhere; line-height: 25px">{!! Str::markdown($produk->keterangan_produk) !!}</p>
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
                  <h3 class="title" data-aos="fade-up-left" data-aos-duration="500">Produk Lainnya</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Recent Post Start -->
                <div class="recent-posts" data-aos="fade-up-left" data-aos-duration="600">
                  <ul>
                    @foreach ($produkLainnya->take(5) as $data)
                      <li>
                        <a class="post-link" href="{{ route('produk.detail', $data->nama_produk) }}">
                          <div class="post-thumb">
                            <img style="object-fit: cover" src="{{ asset('storage/' . $data->foto_produk) }}" alt="">
                          </div>
                          <div class="post-text">
                            <h4 class="title text-truncate detail-truncation">{{ $data->nama_produk }}</h4>
                            <span class="post-meta"><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($data->created_at)->format('M d, Y') }}</span>
                          </div>
                        </a>
                      </li>
                    @endforeach
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
@endsection
