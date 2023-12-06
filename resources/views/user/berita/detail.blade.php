@extends('layouts.nav-user')

@section('content')
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
                <div class="blog-image">
                  <a style="width: 100%; height: 100%"><img style="width: 100%;" src="{{ asset('storage/' . $berita->thumbnail) }}" alt=""></a>
                  <div class="top-meta">
                    <span class="date">
                      <span>{{ \Carbon\Carbon::parse($berita->created_at)->format('d') }}</span>
                      {{ \Carbon\Carbon::parse($berita->created_at)->format('M') }}
                    </span>
                  </div>
                </div>
                <div class="blog-content">
                  <div class="blog-meta d-flex">
                    @foreach ($berita->kategori as $data)
                      <span class="badge rounded-pill mb-1"
                        style="background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 12px; width: 100px; height: 30px; margin-right: 5px">{{ $data->name }}</span>
                    @endforeach
                  </div>
                  <h3 class="title">{{ $berita->title }}</h3>
                  <p class="text">{{ $berita->description }}</p>
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
                  <h3 class="title">Berita Lainnya</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Recent Post Start -->
                <div class="recent-posts">
                  <ul>
                    @foreach ($beritaRandom->take(5) as $data)
                      <li>
                        <a class="post-link" href="{{ route('detailBerita', $data->id) }}">
                          <div class="post-thumb">
                            <img style="object-fit: cover" src="{{ asset('storage/' . $data->thumbnail) }}" alt="">
                          </div>
                          <div class="post-text">
                            <h4 class="title">{{ $data->title }}</h4>
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
                  <h3 class="title">Kategori Berita</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Category Start -->
                <ul class="sidebar-tag">
                  @foreach ($kategoriBerita as $data)
                    <li><a href="{{ route('filterBerita',$data->id) }}">{{ $data->name }}</a></li>
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
