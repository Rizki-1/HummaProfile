<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }} - Sign In</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('cssAdmin/css/login/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('cssAdmin/css/login/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('cssAdmin/css/login/css/iofrm-style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('cssAdmin/css/login/css/iofrm-theme27.css') }}">
  <link rel="stylesheet" href="{{ asset('cssAdmin/css/login/login.css') }}">
</head>

<body>
  <div class="form-body without-side">
    <div class="row">
      <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">
          <img src="{{ asset('cssAdmin/css/login/images/graphic8.svg') }}" alt="">
        </div>
      </div>
      <div class="form-holder">
        <div class="form-content">
          <div class="form-items">
            <div class="logo-container">
              <div class="logo-content">
                <img width="80px" src="{{ asset('ImageGlobal/HummaTech-Logo.png') }}" alt="logo">
              </div>
              <div class="logo-name">
                <a href="#" class="sidebar-logo-thing">Humma<span>tech</span></a>
              </div>
            </div>
            <h3 class="form-title-center">Masuk untuk mengakses akun admin</h3>
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="text" name="email" placeholder="Email" required>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-2">
                <label for="email" class="form-label">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-button">
                <button id="submit" type="submit" class="login-button">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="container d-none">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <script src="{{ asset('cssAdmin/css/login/js/jquery.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/css/login/js/popper.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/css/login/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('cssUser/js/main.js') }}"></script>
</body>

</html>
