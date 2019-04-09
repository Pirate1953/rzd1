
<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>{{__('Ready ticket')}}</title>

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
    <div class="container">
      <div class="py-5 text-center">
        <p></p>
        <h2>{{__('Ready ticket')}}</h2>
        <p class="lead" style="color: black !important;">{{__('Здесь вы можете посмотреть ваш билет. Также на этой форме представлен QR-код, который хранит в себе инофрмацию о купленном билете, его можно загрузить к себе на устройтсво.')}}</p>
      </div>

      <div class="row">

      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">{{__('QR-код')}}</span>
        </h4>
        <p class="lead">{{__('Ниже представлен QR-код, в котором записан ваш билет, выможете скачать его, просто нажав на картинку.')}}</p>
        <a class="btn mt-2 btn-primary" href="data:image/png;base64, {!! $qr !!}" download>
        <img src="data:image/png;base64, {!! $qr !!}" alt="QR" width="200" height="200">
        </a>
      </div>

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">{{__('Информация о билете')}}</h4>
        <div class="form-group" style="font-size: 20px;">
          {{__('Ticket number: ')}} {{ ($ticket->id) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Departure station: ')}} {{ ($ticket->departure_station1()->name) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Arrival station: ')}} {{ ($ticket->arrival_station1()->name) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Type of ticket: ')}} {{ ($ticket->type->name) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Customer: ')}} {{ ($ticket->user->name) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Price: ')}} {{ ($ticket->price) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Start date: ')}} {{ ($ticket->start_date) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('End date: ')}} {{ ($ticket->end_date) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Zone 1: ')}} {{ ($ticket->departure_station1()->zone->name) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Zone 2: ')}} {{ ($ticket->arrival_station1()->zone->name) }}
        </div>
        <div class="form-group" style="font-size: 20px;">
          {{__('Pay status: ')}} {{ ($ticket->paystatus()->name) }}
        </div>
  </div>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; Колганов Сергей, 2019</p>
</footer>
</div>
</body>
</html>
