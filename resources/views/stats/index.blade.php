<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('Статистика')}}</title>

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
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{route('stations.index')}}">{{__('Stations')}}</a>
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
              <a class="nav-link active" href="#">{{__('Статистика')}}<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-10 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>{{__('Статистика')}}</h1>
          <section class="row text-center placeholders">
            <div class="col-md-3 text-center">
            </div>
            <div class="col-md-6 text-center">
              <img src="/media/userico.png" width="140" height="140" class="img-fluid" alt="Users">
              <h2>{{__('Всего пользователей:')}}</h2>
              <p style="font-size: 20px;">{{__($user1)}}</p>
            </div>
            <div class="col-md-3 text-center">
            </div>
            <div class="col-md-6 text-center">
              <img src="/media/Tickets-icon.png" width="140" height="140" class="img-fluid" alt="Users">
              <h2>{{__('Куплено билетов:')}}</h2>
              <p style="font-size: 20px;">{{__($ticket1)}}{{__(' шт.')}}</p>
            </div>
            <div class="col-md-6 text-center">
              <img src="/media/coins.png" width="140" height="140" class="img-fluid rounded-circle" alt="Users">
              <h2>{{__('Прибыль:')}}</h2>
              <p style="font-size: 20px;">{{__($rubs)}}{{__(' руб.')}}</p>
            </div>
            <div class="col-md-3 text-center">
            </div>
            <div class="col-md-6 text-center">
              <img src="/media/phone.png" width="140" height="140" class="img-fluid" alt="Users">
              <h2>{{__('Вход через API:')}}</h2>
              <p style="font-size: 20px;">{{__($token1)}}{{__(' токенов')}}</p>
            </div>
            <div class="col-md-3 text-center">
            </div>
            <div class="col-md-12 text-center">
              <h1>{{__('Статистика по билетам')}}</h1>
            </div>
            {{
                Form::open(['class' => 'col-md-6',
                    'method' => 'GET',
                    'route'  => 'stats.depsort'
                ])
            }}
              {{ Form::label('station_izone_id', __('От куда:')) }}
              {{ Form::select('station_id', $stations, null, ['class' => 'custom-select d-block w-100'])}}
            {{
                Form::submit(
                    __('Получить сведения'),
                    [
                        'class' => 'btn btn-primary mt-2',
                    ]
                )
            }} {{ Form::close() }}
            {{
                Form::open(['class' => 'col-md-6',
                    'method' => 'GET',
                    'route'  => 'stats.arrsort'
                ])
            }}
              {{ Form::label('station_id', __('До куда:')) }}
              {{ Form::select('station_id', $stations, null, ['class' => 'custom-select d-block w-100'])}}
              {{
                  Form::submit(
                      __('Получить сведения'),
                      [
                          'class' => 'btn btn-primary mt-2',
                      ]
                  )
              }} {{ Form::close() }}
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
          <hr>
          <div class="container text-center">
            <p>&copy; Колганов Сергей, 2019</p>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
