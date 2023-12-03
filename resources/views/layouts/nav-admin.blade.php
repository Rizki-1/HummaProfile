<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.3.67/css/materialdesignicons.min.css" integrity="sha512-nRzny9w0V2Y1/APe+iEhKAwGAc+K8QYCw4vJek3zXhdn92HtKt226zHs9id8eUq+uYJKaH2gPyuLcaG/dE5c7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/core/core.css') }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/flatpickr/flatpickr.min.css') }}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('cssAdmin/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/demo1/style.min.css') }}">
  <!-- End layout styles -->

  {{-- Date Picker --}}
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/pickr/themes/classic.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/flatpickr/flatpickr.min.css') }}">

  {{-- Dropify --}}
  <link rel="stylesheet" href="{{ asset('cssAdmin/vendors/dropify/dist/dropify.min.css') }}">

  <!-- JQuery -->
  <script src="{{ asset('cssAdmin/js/jquery-ini.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- core:js -->
  <script src="{{ asset('cssAdmin/vendors/core/core.js') }}"></script>

  {{-- CSS PERSETUJUAN --}}
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/persetujuan/persetujuan.css') }}">

  <link rel="shortcut icon" href="{{ asset('ImageGlobal/HummaTech-Logo.png') }}" />
</head>

<body>
  <div class="main-wrapper">

    <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Humma<span>tech</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          {{-- Sidebar start here --}}
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item nav-category">List</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#list" role="button" aria-expanded="false"
              aria-controls="berita">
              <i class="link-icon" data-feather="grid"></i>
              <span class="link-title">List</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="list">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('list.siswa_magang') }}" class="nav-link">Siswa Magang</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('list.kelas_industri') }}" class="nav-link">Kelas Industri</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Persetujuan</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#persetujuan" role="button" aria-expanded="false"
              aria-controls="persetujuan">
              <i class="link-icon" data-feather="check-square"></i>
              <span class="link-title">Persetujuan</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="persetujuan">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('persetujuan.siswa') }}" class="nav-link">Siswa Magang</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('persetujuan.industri') }}" class="nav-link">Kelas Industri</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Berita</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#berita" role="button" aria-expanded="false"
              aria-controls="berita">
              <i class="link-icon" data-feather="copy"></i>
              <span class="link-title">Berita</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="berita">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('berita.index') }}" class="nav-link">Berita</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('category-berita.index') }}" class="nav-link">Kategori Berita</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Contact</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('inbox.index') }}">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Inbox</span>
            </a>
          </li>

          <li class="nav-item nav-category">Produk</li>
          <li class="nav-item">
            <a href="{{ route('produk.index') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Produk</span>
            </a>
          </li>

          <li class="nav-item nav-category">Pengaturan</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pengaturan" role="button" aria-expanded="false"
              aria-controls="pengaturan">
              <i class="link-icon" data-feather="settings"></i>
              <span class="link-title">Pengaturan</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="pengaturan">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('profile-perusahaan.index') }}" class="nav-link">Pengaturan Profile</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('layanan-perusahaan.index') }}" class="nav-link">Layanan Perusahaan</a>
                </li>
              </ul>
            </div>
          </li>
          {{-- Sidebar ends here --}}
        </ul>
      </div>
    </nav>
    <!-- partial -->

    <div class="page-wrapper">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
          <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="wd-30 ht-30 rounded-circle" src="{{ asset('ImageGlobal/HummaTech-Logo.png') }}"
                  alt="profile">
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                  <div class="mb-3">
                    <img class="wd-80 ht-80 rounded-circle" src="{{ asset('ImageGlobal/HummaTech-Logo.png') }}"
                      alt="">
                  </div>
                  <div class="text-center">
                    <p class="tx-16 fw-bolder">{{ config('app.name') }}</p>
                    <p class="tx-12 text-muted">{{ \App\Models\ProfileCompany::get('email')[0]->email }}</p>
                  </div>
                </div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <button type="submit" class="text-body ms-0" id="button-logout">
                          <i class="me-2 icon-md" data-feather="log-out"></i>
                          <span>Log Out</span>
                      </button>
                    </form>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->

      <div class="page-content">
        @yield('content')
      </div>

      <!-- partial:partials/_footer.html -->
      <footer
        class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
        <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a
            href="https://www.google.com/search?q=hummatech&rlz=1C1FKPE_idID1058ID1058&oq=hummatech&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIPCAEQLhgKGMcBGNEDGIAEMgkIAhAAGAoYgAQyBggDEEUYPDIGCAQQRRg8MgYIBRBFGDzSAQgxNzIxajBqN6gCALACAA&sourceid=chrome&ie=UTF-8"
            target="_blank">{{ config('app.name') }}</a>.</p>
        <p class="text-muted">Di buat oleh Hummaprofile <i class="mb-1 text-primary ms-1 icon-sm"
            data-feather="heart"></i></p>
      </footer>
      <!-- partial -->

    </div>
  </div>

  <!-- endinject -->
    @if (session('message'))
    <script>
        Swal.fire({
        icon: "{{ session('message')['icon'] ?? 'question' }}",
        title: "{{ session('message')['title'] ?? 'Tidak ada keteerangan' }}",
        text: "{{ session('message')['text'] ?? 'Tidak ada keterangan' }}",
        })
    </script>
    @endif
  <!-- Plugin js for this page -->
  <script src="{{ asset('cssAdmin/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset('cssAdmin/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/template.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <script src="{{ asset('cssAdmin/js/dashboard-light.js') }}"></script>
  <!-- End custom js for this page -->

  {{-- Dropify --}}
  <script src="{{ asset('cssAdmin/vendors/dropify/dist/dropify.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/dropify.js') }}"></script>

  {{-- Data Picker --}}
  <script src="{{ asset('vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/js/flatpickr.js') }}"></script>
</body>

</html>
