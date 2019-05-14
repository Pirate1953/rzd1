
<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('Edit type')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/v.4.0.0-alpha-6-bootstrap.min.css?x') }}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/users/addcard.css?x') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body class="bg-light">
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

    <div class="container">
      <div class="py-5 text-center">
        <p></p>
        <img class="d-block mx-auto mb-4 img-fluid rounded-circle" src="/media/dashboard_ico/Type_ico.png" alt="" width="160" height="160">
        <h2>{{__('Edit type')}}</h2>
        <p class="lead" style="color: black !important;">{{__('Эта форма используется для редактирования типов билетов. Типы билетов также как и зоны будут определять цену билета.')}}</p>
      </div>

      <div class="row">

      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">{{__('Примечание')}}</span>
        </h4>
          <p class="lead">{{__('Номера типов определяют их порядок следования друг за другом, это ни как не связано с идентификатором в базе данных.')}}</p>
      </div>

      <div class="col-md-8 order-md-1">

    {{-- Форма предъявляется методом HTTP PUT на веб‑адрес: types/ID, где ID ⁠— первичный ключ --}}
    {{
        Form::model($type, [
            'method' => 'PUT',
            'route'  => [
                'types.update',
                $type->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/types/partials/form.blade.php --}}
    @include('types.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update type'),
            [
                'class' => 'btn btn-primary btn-lg btn-block',
            ]
        )
    }}

    {{ Form::close() }}
  </div>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; Колганов Сергей, 2019</p>
</footer>
</div>
</body>
</html>
