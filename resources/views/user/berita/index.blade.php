@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <div class="section techwix-blog-grid-section section-padding" style="background: #f8f8f8;">
    <div class="container">
      <div class="techwix-blog-grid-wrap">
        <div class="section-title text-center mb-4 mt-4">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Berita</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Berita terbaru terkait perusahaan kami</h2>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="900">
            @forelse ($beritaAll as $data)
            <div class="col-lg-4 col-md-6">
                <!-- Single Blog Start -->
                <div class="single-blog">
                  <div class="blog-image">
                      <a style="height: 250px; width: 100%" href="{{ route('detailBerita', $data->title) }}"><img style="height: 100%; width: 100%; object-fit: cover;" src="{{ asset('storage/' . $data->thumbnail) }}" alt="{{ $data->title }}"></a>
                    <div class="top-meta">
                      <span class="date">
                        <span>{{ \Carbon\Carbon::parse($data->created_at)->format('d') }}</span>
                        {{ \Carbon\Carbon::parse($data->created_at)->format('M') }}
                      </span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      @foreach ($data->kategori as $item)
                        <span class="badge rounded-pill mb-1" style="background:linear-gradient(195deg, #086ad8 0%, #42b9ff 100%); color: #f4f4f4; width: 100px; height: 30px; font-size: 12px; margin-right: 5px"><a
                            href="{{ route('filter-category', $item->id) }}">{{ $item->name }}</a></span>
                      @endforeach
                    </div>
                    <h3 class="title"><a href="{{ route('detailBerita', $data->title) }}">{{ $data->title }}</a></h3>
                    <div class="blog-btn">
                      <a class="blog-btn-link" href="{{ route('detailBerita', $data->title) }}">Read Full <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                  </div>
                </div>
                <!-- Single Blog End -->
              </div>
            @empty
            <div class="nodata gap-3 text-center">
                <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="" style="height: 200px; ">
                <p style="font-size: 30px;"><b>Tidak ada data berita</b></p>
              </div>
            @endforelse
        </div>
        <div class="mt-4">
          <!-- Page Pagination Start -->
          {{ $beritaAll->links('pagination::bootstrap-5') }}
          <!-- Page Pagination End -->
        </div>
      </div>
    </div>
  </div>

  @if ($kategori->count() > 0)
  <div class="section mb-5">
    <div class="container d-flex justify-content-center">
      <div class="sidebar-widget">
        <div class="widget-title text-center">
          <h3 class="title" data-aos="fade-up" data-aos-duration="600">Kategori Berita</h3>
        </div>
        <ul class="sidebar-tag" data-aos="fade-up" data-aos-duration="800">
          @foreach ($kategori as $data)
            <li><a href="{{ route('filter-category', $data->id) }}">{{ $data->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @endif

@endsection
