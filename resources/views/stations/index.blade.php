<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('Stations')}}</title>

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
            <a class="nav-link" href="{{ route('users.editprofileforadmin') }}">{{__('Edit Profile')}}</a>
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
        {{
            Form::open(['class' => 'form-inline mt-2 mt-md-0',
                'method' => 'GET',
                'route'  => 'stations.sort'
            ])
        }}
        <input class="form-control mr-sm-2" type="text" name="name" placeholder="Введите название">
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
              <a class="nav-link active" href="#">{{__('Stations')}}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('zones.index')}}">{{__('Zones')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('types.index')}}">{{__('Types of tickets')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.usersindex')}}">{{__('Users')}}</a>
            </li>
          </ul>

          <hr>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{route('stats.statindex')}}">{{__('Статистика')}}</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>{{__('Stations')}}</h1>
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <a href="{{route('stations.index')}}"><img src="/media/dashboard_ico/St_ico.png" width="200" height="200" class="img-fluid rounded-circle" alt="Stations"></a>
              <h4>{{__('Stations')}}</h4>
              <div class="text-muted">{{__('Работа со станциями')}}</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <a href="{{route('zones.index')}}"><img src="/media/dashboard_ico/Zone_ico.png" width="200" height="200" class="img-fluid rounded-circle" alt="Zones"></a>
              <h4>{{__('Zones')}}</h4>
              <span class="text-muted">{{__('Работа с зонами')}}</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <a href="{{route('types.index')}}"><img src="/media/dashboard_ico/Type_ico.png" width="200" height="200" class="img-fluid rounded-circle" alt="Types"></a>
              <h4>{{__('Types of tickets')}}</h4>
              <span class="text-muted">{{__('Работа с типами билетов')}}</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <a href="{{route('users.usersindex')}}"><img src="/media/dashboard_ico/User_ico.png" width="200" height="200" class="img-fluid rounded-circle" alt="Users"></a>
              <h4>{{__('Users')}}</h4>
              <span class="text-muted">{{__('Работа с аккаунтами')}}</span>
            </div>
          </section>
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
          <p></p>
          {{
              Html::secureLink(
                  route('stations.create'),
                  __('Add station')
              )
          }}

          <h2>{{__('Таблица станций')}}</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Number') }}</th>
                    <th></th>
                    <th>{{ __('Edit station') }}</th>
                    <th>{{ __('Remove station') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($stations as $station)
                <tr>
                  <td>{{ Html::secureLink(
                      route('stations.show', $station->id),
                      $station->name
                  )}}</td>
                    <td>{{ $station->number }}</td>
                    <td>{{ Html::secureLink(
                        route('stations.addimage', $station->id),
                        __('Images')
                    )}}</td>
                    <td>{{ Html::secureLink(
                        route('stations.edit', $station->id),
                        __('Edit station')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('stations.remove', $station->id),
                        __('Remove station')
                    ) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{$stations->links()}}
          <hr>
          <div class="container text-center">
            <p>&copy; Колганов Сергей, 2019</p>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
