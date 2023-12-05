@extends('layouts.nav-user')

@section('content')
  <!-- Blog Details Start -->
  <div class="section blog-details-section section-padding-02">
    <div class="container">
      <!-- Blog Details Wrap Start -->
      <div class="blog-details-wrap">
        <div class="row">
          <div class="col-xl-8 col-lg-8">
            <!-- Blog Details Post Start -->
            <div class="blog-details-post">
              <!-- Single Blog Start -->
              <div class="single-blog-post single-blog">
                <div class="blog-image bg-primary">
                  <a href=""><img src="{{ asset('storage/' . $berita->thumbnail) }}" alt=""></a>
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
                      <span class="badge rounded-pill"
                        style="background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 12px; width: 100px">{{ $data->name }}</span>
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
                            <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="">
                          </div>
                          <div class="post-text">
                            <h4 class="title">{{ $data->title }}</h4>
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

              <!-- Sidebar Widget Start -->
              <div class="sidebar-widget">
                <!-- Widget Title Start -->
                <div class="widget-title">
                  <h3 class="title">Tags</h3>
                </div>
                <!-- Widget Title End -->
                <!-- Widget Category Start -->
                <ul class="sidebar-tag">
                  <li><a href="#">Learning</a></li>
                  <li><a href="#">Course</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Udemy</a></li>
                  <li><a href="#">Online</a></li>
                  <li><a href="#">Technology</a></li>
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
