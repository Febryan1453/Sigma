<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="{{ asset ('loginNew/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('RuangGuru/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="txt_field">
          <input type="text" name="email" value="{{ old('email') }}">
          <span></span>
          <label>Email</label>
          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>

        <div class="txt_field">
          <input type="password" name="password">
          <span></span>
          <label>Password</label>
          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>

        <input type="submit" value="Login">


        <div class="signup_link">
        </div>

      </form>
    </div>

  </body>
</html>
