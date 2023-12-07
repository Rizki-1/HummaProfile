@extends('layouts.nav-user')

@section('content')
  {{-- <link rel="stylesheet" href="{{ asset('cssUser/css/landing-page/forceNav.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('cssUser/css/pendidikan/style.css') }}">

  <!-- Page Banner Start -->
  <div class="section" style="padding-top: 0px;">
    <div class="video">
      <div class="dark-overlay"></div>
      <video src="{{ asset('ImageGlobal/industri.mp4') }}" autoplay loop muted playsinline></video>
    </div>

    <div class="depan" style="position: absolute; z-index: 3; top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="container">
        <div class="page-banner-wrap">
          <div class="row">
            <div class="col-lg-12">
              <!-- Page Banner Content Start -->
              <div class="page-banner text-center">
                <h2 class="title">Tentang Kelas Industri</h2>
                {{-- <ul class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ul> --}}
              </div>
              <!-- Page Banner Content End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner End -->

  <div class="section techwix-choose-us-section-02 section-padding-02"
    style="padding-bottom: 110px; padding-top: 100px; background-color: #ffffff">
    <div class="container">
      <!-- Choose Us Wrap Start -->
      <div class="choose-us-wrap">
        <div class="row">
          <div class="col-lg-6">
            <!-- Choose Us Left Start -->
            <div class="choose-us-left">
              <div class="section-title">
                <h3 class="sub-title" data-aos="fade-up-right" data-aos-duration="500">Pendaftaran kelas industri</h3>
                <h2 class="title" data-aos="fade-up-right" data-aos-duration="700">Dapatkan infomasi terkait pendaftaran
                  kelas industri di sini</h2>
              </div>
              <p class="text mb-3" data-aos="fade-up-right" data-aos-duration="900">Kami menyediakan kesempatan untuk
                meningkatkan keterampilan dan pengetahuan dalam dunia teknologi. Kelas industri kami menawarkan kurikulum
                yang terkini dan diajarkan oleh para ahli industri yang berpengalaman.</p>
              <div data-aos="fade-up-right" data-aos-duration="1000"><a href="https://class.hummatech.com/"
                  target="_blank" class="btn btn-primary">Daftar</a></div>
            </div>
            <!-- Choose Us Left End -->
          </div>
          <div class="col-lg-6">
            <!-- Choose Us Right Start -->
            <div class="choose-us-right">
              <!-- Faq Accordion Start -->
              <div class="faq-accordion">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item" data-aos="fade-up-left" data-aos-duration="500">
                    <div class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span class="title">Syarat & Ketentuan</span>
                      </button>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample" data-aos="fade-up-left" data-aos-duration="800">
                      <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem animi labore voluptatibus? Modi
                        possimus quos doloremque nihil. Omnis, adipisci ex, ad sapiente vitae esse id vel mollitia, est
                        numquam aliquam.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item" data-aos="fade-up-left" data-aos-duration="700">
                    <div class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <span class="title">Syarat & Ketentuan</span>
                      </button>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quia facere molestiae doloremque
                        cum tempore cumque, similique dolore soluta consequuntur maxime tempora! Autem perspiciatis facere
                        porro iusto, hic eveniet sed!
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item" data-aos="fade-up-left" data-aos-duration="900">
                    <div class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="title">Syarat & Ketentuan</span>
                      </button>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo aperiam cupiditate, veritatis,
                        ipsam accusantium esse voluptate ducimus distinctio a quidem animi nihil aut consectetur? Possimus
                        veritatis tempora maiores doloremque soluta?
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Faq Accordion End -->
            </div>
            <!-- Choose Us Right End -->
          </div>
        </div>
      </div>
      <!-- Choose Us Wrap End -->
    </div>
  </div>

  <!-- Service Start -->
  <div class="section techwix-service-section section-padding-02" style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h3 class="sub-title" data-aos="fade-up" data-aos-duration="500">Layanan Industri</h3>
          <h2 class="title" data-aos="fade-up" data-aos-duration="700">Tingkatkan Pengalaman Anda dengan Layanan
            Perusahaan Kami</h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="900">
          @if ($layananIndustri->count() > 0)
            <div class="row justify-content-center">
              @foreach ($layananIndustri as $key => $data)
                <div class="col-xl-3 col-sm-12">
                  <!-- Service Item Start -->
                  <div class="service-item service-0{{ ++$key }}">
                    <div class="service-content">
                      <h3 class="title"><a class="layanan-truncation-title">{{ $data->nama_layanan }}</a></h3>
                      <p class="layanan-truncation-text">{{ $data->descripsi_layanan }}</p>
                    </div>
                  </div>
                  <!-- Service Item End -->
                </div>
              @endforeach
            </div>
          @else
            <div class="nodata gap-3">
              <img src="{{ asset('cssUser/images/zerodata.png') }}" alt="">
              <p>Data layanan tidak tersedia</p>
            </div>
          @endif
        </div>
        <div class="d-flex justify-content-center mt-5">
          {{ $layananIndustri->links('pagination::simple-bootstrap-5') }}
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->

  <!-- Service Start -->
  <div class="section techwix-service-section section-padding-02" style="padding-bottom: 70px; padding-top: 20px">
    <div class="container">
      <!-- Service Wrap Start -->
      <div class="service-wrap">
        <div class="section-title text-center">
          <h2 class="title" data-aos="fade-up" data-aos-duration="700"
            style="padding: 20px; text-transform: capitalize">List sekolah yang sudah melakukan tanda tangan MoU dengan
            <span style="color: #22B3E2">Humma</span>Tech
          </h2>
        </div>
        <div class="service-content-wrap" data-aos="fade-up" data-aos-duration="1000">
          <div class="sekolah-logo-container row">
            @forelse ($Mous as $data)
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('storage/' . $data->foto_mou) }}" alt="MoU sekolah {{ $data->nama_mou }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>{{ $data->nama_mou }}</p>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-1.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-2.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-3.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-4.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-5.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-6.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-7.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-8.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-9.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-10.jpg') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-12">
                <div class="card-logo-sekolah">
                  <div class="img-sekolah">
                    <img src="{{ asset('cssUser/sekolah/smk-11.png') }}">
                  </div>
                  <div class="nama-sekolah">
                    <p>SMKN 1 Bababoi Papope Bababoi Papope Bababoi</p>
                  </div>
                </div>
              </div>
            @endforelse
          </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
          {{ $layananIndustri->links('pagination::simple-bootstrap-5') }}
        </div>
      </div>
      <!-- Service Wrap End -->
    </div>
  </div>
  <!-- Service End -->
@endsection
