@php
$row=App\Options::where('key','system_basic_info')->first();     
$siteInfo=json_decode($row->value);   

@endphp
<!DOCTYPE html>
<html>
<head>
  <title>{{ __('Register') }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/default.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset($siteInfo->favicon) }}">
</head>
<body>
  <div class="container">
    <div class="form">
      <div class="sign-in-section">
        <h1 class="mb-30">{{ __('Register') }}</h1>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-field mb-10">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-field mb-10">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-field">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-field">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
           
          </div>

          <div class="form-field center">
            <input type="submit" class="btn btn-signin" value="Register Now" />
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
</html>



