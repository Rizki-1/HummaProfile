@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

  <style>
    .card-dashboard {
      height: 100%;
    }

    .card-dashboard .card-detail {
      background-color: rgba(58, 173, 245, 0.541);
    }

    .card-dashboard .card-detail .card-body {
      position: relative;
    }

    .card-dashboard .card-detail .card-body .icon {
      position: absolute;
      display: flex;
      align-items: flex-end;
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      font-size: 5px;
      overflow: hidden;
      z-index: 2;
    }

    .card-dashboard .card-detail .card-body .icon svg {
      position: absolute;
      right: 170px;
      bottom: -50px;
      transform: rotate(40deg);
      color: rgba(255, 255, 255, 0.541);
    }

    .card-dashboard .card-detail .card-body .text-text {
      position: relative;
      color: #141414;
      height: 70%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      text-align: center;
      z-index: 4;
    }

    .card-dashboard .card-detail .card-body .text-text .card-title {
      font-size: 20px;
      letter-spacing: 1px;
      color: #f4f4f4;
    }

    .card-dashboard .card-detail .card-body .text-text .card-text {
      font-size: 130px;
      font-family: "Barlow", sans-serif;
      color: #f4f4f4;
    }


  </style>

  <div class="row justify-content-center flex-wrap h-100">
    <div class="col-md-4 card-dashboard">
      <div class="card card-detail text-white h-100">
        <div class="card-body">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-box">
              <path
                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
              <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
              <line x1="12" y1="22.08" x2="12" y2="12" />
            </svg>
          </div>
          <div class="text-text">
            <h5 class="card-title">Jumlah Produk</h5>
            <p class="card-text">{{ $produkCount }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 card-dashboard">
      <div class="card card-detail text-white h-100">
        <div class="card-body">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-book-open">
              <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
              <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
            </svg>
          </div>
          <div class="text-text">
            <h5 class="card-title">Jumlah Berita</h5>
            <p class="card-text">{{ $beritaCount }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 card-dashboard">
      <div class="card card-detail text-white h-100">
        <div class="card-body">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-inbox">
              <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
              <path
                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
            </svg>
          </div>
          <div class="text-text">
            <h5 class="card-title">Jumlah inbox</h5>
            <p class="card-text">{{ $inboxCount }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
