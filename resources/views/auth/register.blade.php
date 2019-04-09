<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>{{__('Register')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/auth/signin.css?x') }}" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
      @csrf
      <input id="gender_id" type="hidden" class="form-control{{ $errors->has('gender_id') ? ' is-invalid' : '' }}" name="gender_id" value="{{ '3' }}" required autofocus>
      <input id="role_id" type="hidden" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" value="{{ '6778' }}" required autofocus>
      <input id="userstat_id" type="hidden" class="form-control{{ $errors->has('userstat_id') ? ' is-invalid' : '' }}" name="userstat_id" value="{{ '1' }}" required autofocus>
      <a href="{{route('stations.aboutproject')}}"><img class="mb-4 rounded" src="/rzd1/storage/app/logo.png" alt="" width="72" height="72"></a>
      <h1 class="h3 mb-3 font-weight-normal">{{__('Register')}}</h1>
      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Имя" required autofocus>

      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif

      <input id="fam" type="text" class="form-control{{ $errors->has('fam') ? ' is-invalid' : '' }}" name="fam" value="{{ old('fam') }}" placeholder="Фамилия" required autofocus>

      @if ($errors->has('fam'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('fam') }}</strong>
          </span>
      @endif

      <input id="patr" type="text" class="form-control{{ $errors->has('patr') ? ' is-invalid' : '' }}" name="patr" value="{{ old('patr') }}" placeholder="Отчество">

      @if ($errors->has('patr'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('patr') }}</strong>
          </span>
      @endif

      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Адрес эл. почты" required>

      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif

      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Пароль" required>

      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif

      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтвердить пароль" required>
      <a href="{{route('login')}}" >{{__('Уже есть аккаунт')}}</a>
      <button class="btn btn-lg btn-primary btn-block" type="submit">{{__('Register')}}</button>
      <p class="mt-5 mb-3 text-muted">&copy; Колганов Сергей, 2019</p>
    </form>
  </body>
</html>
