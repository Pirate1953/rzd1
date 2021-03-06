<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('History')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

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
        {{
            Form::open(['class' => 'form-inline mt-2 mt-md-0',
                'method' => 'GET',
                'route'  => 'tickets.sortforuserswithprice'
            ])
        }}
        <input class="form-control mr-sm-2" type="number" name="price" placeholder="Введите цену билета">
        {{
            Form::submit(
                __('Search'),
                [
                    'class' => 'btn btn-primary my-2 my-sm-0',
                ]
            )
        }} {{ Form::close() }}
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{route('stations.indexforusers')}}">{{__('Stations')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('tickets.prepare')}}">{{__('Buy tickets')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('rasps.raspmainuser')}}">{{__('Расписание')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">{{__('History')}}<span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <hr>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{route('cards.indexcard')}}">{{__('Cards')}}</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>{{__('History')}}</h1>
          <div class="customcenter" style="text-align: center!important;">
          <img class="mb-4 rounded" style="" src="/media/logo.png" alt="" width="90" height="90">
        </div>
          <p class="lead text-center" style="margin: 0 auto !important;">{{__('Здесь вы можете увидеть историю ваших купленных билетов. Тут отображаются билеты, за которые была произведена оплата. Для того чтобы купить билет на электропоезд, вы можете перейти')}} {{Html::secureLink(route('tickets.prepare'),__('сюда.'))}}</p>
          @if (Session::has('message'))
              {{-- Всплывающие сообщения. --}}
              <div class="alert alert-success">
                  {{ Session::get('message') }}
              </div>
          @endif

          @if ($errors->count())
              {{-- Перечень ошибок. --}}
              <div class="alert alert-danger">
                  {{ Html::ul($errors->all()) }}
              </div>
          @endif

          <h2>{{__('History')}}</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                  <th>{{ __('Ticket number: ') }}</th>
                  <th>{{ __('Price: ') }}</th>
                  <th>{{ __('Departure station: ') }}</th>
                  <th>{{ __('Arrival station: ') }}</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                  <td>{{ Html::secureLink(
                      route('tickets.showfinal', $ticket->id),
                      $ticket->id
                  )}}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->departure_station1()->name }}</td>
                    <td>{{ $ticket->arrival_station1()->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr>
          <div class="container text-center">
            <p>&copy; Колганов Сергей, 2019</p>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
