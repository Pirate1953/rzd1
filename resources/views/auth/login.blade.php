
<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>{{__('Login')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/auth/signin.css?x') }}" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
      @csrf
      <a href="{{route('stations.aboutproject')}}"><img class="mb-4 rounded" src="/rzd1/storage/app/logo.png" alt="" width="72" height="72"></a>
      <h1 class="h3 mb-3 font-weight-normal">{{__('Login')}}</h1>
      <label for="email" class="sr-only">{{__('Email')}}</label>
      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Адрес эл. почты" required autofocus>

      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      <label for="inputPassword" class="sr-only">{{__('Password')}}</label>
      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Пароль" required>

      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <label><input type="checkbox" value="remember-me">{{__(' Запомнить меня')}}</label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">{{__('Login')}}</button>
      <a class="btn btn-lg btn-success btn-block" href="{{route('register')}}">{{__('Register')}}</a>
      <p class="mt-5 mb-3 text-muted">&copy; Колганов Сергей, 2019</p>
    </form>
  </body>
</html>
