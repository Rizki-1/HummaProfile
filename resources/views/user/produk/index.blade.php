@extends('layouts.nav-user')

@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceLogo.css') }}">
<style>
  .nodata {
    display: flex;
    flex-flow: column;
    align-items: center;
    margin: 2rem 0 0;
  }

  .nodata img {
    height: 12rem;
  }

  .nodata p {
    font-weight: 600;
    font-size: 25px;
    color: #b3b6c5;
  }
</style>
  <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}">
  <div class="section techwix-choose-us-section section-padding" style="padding-top: 100px">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap py-3">
        <div class="section-title text-center">
          <h3 class="sub-title">Produk</h3>
          <h2 class="title">Produk yang kami hasilkan</h2>
        </div>
        <div class="choose-us-content-wrap">
          @if($produk->count() > 0)
          <div class="row justify-content-center">
            @foreach ($produk as $produkRow)
            <div class="col-lg-4 col-md-6">
              <!-- Choose Us Item Start -->
              <div class="choose-us-item">
                <div class="choose-us-img">
                  <a href="{{ route('produk.detail', $produkRow->id) }}">
                    <img class="picture-responsive" src="{{ asset('storage/' . $produkRow->foto_produk) }}" alt="Foto Produk"></a>
                    <div class="choose-us-content">
                      <h3 class="title text-truncate">{{ $produkRow->nama_produk }}</h3>
                      <p class="description-truncate">{{ $produkRow->keterangan_produk }}</p>
                    </div>
                  </div>
                </div>
                <!-- Choose Us Item End -->
              </div>
              @endforeach
            </div>
            @else
            <div class="nodata gap-3">
              <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
              <p>Data produk tidak tersedia</p>
            </div>
            @endif
            <div>
              {{ $produk->links('pagination::bootstrap-5') }}
            </div>
          </div>
        </div>
        <!-- Choose Us Wrap End -->
      </div>
    </div>
@endsection
