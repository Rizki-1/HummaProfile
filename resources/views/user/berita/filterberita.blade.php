@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <div class="section techwix-blog-grid-section section-padding" style="background-color: #f8f8f8;">
    <div class="container">
      <div class="techwix-blog-grid-wrap" data-aos="fade-up" data-aos-duration="500">
        <div class="section-title text-center mb-4 mt-4">
            <div class="section-title text-center mb-3">
                <h3 class="sub-title m-0">Kategori Berita</h3>
                <h2 class="title">{{$nameKategori}}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
          @foreach ($beritas as $berita)
            <div class="col-lg-4 col-md-6">
              <!-- Single Blog Start -->
              <div class="single-blog">
                <div class="blog-image">
                  <a style="height: 250px; width: 100%" href="{{ route('detailBerita', $berita->berita->title) }}"><img
                      style="height: 100%; width: 100%; object-fit: cover;"
                      src="{{ asset('storage/' . $berita->berita->thumbnail) }}" alt="{{ $berita->berita->title }}"></a>
                  <div class="top-meta">
                    <span class="date">
                      <span>{{ \Carbon\Carbon::parse($berita->berita->created_at)->format('d') }}</span>
                      {{ \Carbon\Carbon::parse($berita->berita->created_at)->format('M') }}
                    </span>
                  </div>
                </div>
                <div class="blog-content">
                  <div class="blog-meta">
                    @foreach ($berita->berita->kategori as $item)
                      <a href="{{ route('filter-category', $item->id) }}" class="badge rounded-pill mb-1"
                        style="background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; font-size: 12px;margin-right: 5px">{{ $item->name }}</a>
                    @endforeach
                  </div>
                  <h3 class="title"><a
                      href="{{ route('detailBerita', $berita->berita->title) }}">{{ $berita->berita->title }}</a></h3>
                  <div class="blog-btn">
                    <a class="blog-btn-link" href="{{ route('detailBerita', $berita->berita->title) }}">Read Full <i
                        class="fas fa-long-arrow-alt-right"></i></a>
                  </div>
                </div>
              </div>
              <!-- Single Blog End -->
            </div>
          @endforeach
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
            <li><a href="{{ route('filter-category', $data->id) }}">{{ $data->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
