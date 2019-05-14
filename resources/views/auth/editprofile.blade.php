<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('Edit Profile')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="{{ asset('css/auth/editprofile.css?x') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/Index_dashboard/dashboard.css?x') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ route('redir') }}">{{ config('app.name', 'Laravel') }}</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.editprofile') }}">{{__('Edit Profile')}}</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('cards.createcard') }}">{{ __('Add card') }}</a>
              <a class="dropdown-item" href="{{ route('users.editstat') }}">{{ __('Change status') }}</a>
              <hr>
              <a class="dropdown-item" style="color: red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >{{__('Logout')}}</a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </nav>
    {{
        Form::model($user, ['class' => 'form-editprofile',
            'method' => 'PUT',
            'route'  => [
                'users.updateuser',
                $user->id,
            ]
        ])
    }}
      <h1 class="h3 mb-3 font-weight-normal">{{__('Edit Profile')}}</h1>

      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" placeholder="Имя" required autofocus>

      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif

      <input id="fam" type="text" class="form-control{{ $errors->has('fam') ? ' is-invalid' : '' }}" name="fam" value="{{ $user->fam }}" placeholder="Фамилия" required autofocus>

      @if ($errors->has('fam'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('fam') }}</strong>
          </span>
      @endif

      <input id="patr" type="text" class="form-control{{ $errors->has('patr') ? ' is-invalid' : '' }}" name="patr" value="{{ $user->patr }}" placeholder="Отчество">

      @if ($errors->has('patr'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('patr') }}</strong>
          </span>
      @endif

      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" disabled placeholder="Адрес эл. почты" required>

      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      <div class="mb-2 mt-2">
      <a href="{{route('users.editpass')}}" >{{__('Change password')}}</a>
      </div>
      {{
          Form::submit(
              __('Save'),
              [
                  'class' => 'btn btn-lg btn-primary btn-block',
              ]
          )
      }}
      <hr></hr>
      <button type="button" style="background-color: red; border-color: red;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        {{__('Delete account')}}
      </button>
      <p class="mt-5 mb-3 text-muted">&copy; Колганов Сергей, 2019</p>
    {{Form::close()}}
  </body>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Подтверждение удаления')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">Вы действительно хотите удалить аккаунт?</div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" style="background-color: red; color: white;" data-dismiss="modal">{{__('Нет')}}</button>
      {{
          Form::model($user, [
              'method' => 'DELETE',
              'route'  => [
                  'users.deletecurrentuser',
                  $user->id,
              ]
          ])
      }}
      {{
          Form::submit(
              __('Да'),
              [
                  'class' => 'btn btn-primary',
              ]
          )
      }}
      {{ Form::close() }}
    </div>
      </div>
    </div>
  </div>
</html>
