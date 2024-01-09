<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/default.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    <div class="container">
      <div class="form">
        <div class="sign-in-section">
          <h1 class="mb-30">Reset Password</h1>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-field mb-10">
              <label for="email">Email</label>
              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-field">
          <input type="submit" class="btn btn-signin" value="Send Password Reset Link" />
      </div>
  </form>
</div>
</div>
</div>
</body>
</html>

































