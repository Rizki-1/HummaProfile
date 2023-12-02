@extends('layouts.nav-admin')

@section('content')
  <div class="row justify-content-center flex-wrap">
    <div class="col-md-4">
      <div class="card text-white bg-primary h-100 d-flex flex-row align-items-center">
        <div class="card-body">
          <i class="fa-solid fa-people-roof fa-3x"></i>
        </div>
        <div class="card-body text-end">
          <h5 class="card-title">Jumlah Siswa Magang</h5>
          <p class="card-text">12</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-danger h-100 d-flex flex-row align-items-center">
        <div class="card-body">
          <i class="fa fa-ticket fa-3x"></i>
        </div>
        <div class="card-body text-end">
          <h5 class="card-title">Instances</h5>
          <p class="card-text">599</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-success h-100 d-flex flex-row align-items-center">
        <div class="card-body">
          <i class="fa fa-database fa-3x"></i>
        </div>
        <div class="card-body text-end">
          <h5 class="card-title">Data</h5>
          <p class="card-text">6875</p>
        </div>
      </div>
    </div>
  </div>
@endsection
