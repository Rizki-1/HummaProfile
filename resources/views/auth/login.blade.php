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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
              <div class="row mb-2">
                <div class="col-md-12 text-end">
                  <div class="p-0">
                    <img class="checked-icon" src="{{ asset('cssAdmin/css/login/images/Checked.png') }}" alt="Checked">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Ingat Saya') }}
                    </label>
                  </div>
                </div>
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
  <script src="{{ asset('cssAdmin/css/login/js/jquery.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/css/login/js/popper.min.js') }}"></script>
  <script src="{{ asset('cssAdmin/css/login/js/bootstrap.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ asset('cssUser/js/main.js') }}"></script>
</body>

</html>
