
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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-field mb-10">
              <label for="email">Email</label>
              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-field mb-10">
          <label for="password">Password</label>
          <input id="password" type="password" placeholder="Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-field mb-10">
      <label for="confirm_password">Confirm Password</label>
      <input id="confirm_password" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
</div>
<div class="form-field">
  <input type="submit" class="btn btn-signin" value="Reset Password" />
</div>
</form>
</div>
</div>
</div>
</body>
</html>