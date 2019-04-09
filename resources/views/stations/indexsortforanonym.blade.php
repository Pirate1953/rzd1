<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>{{__('Stations')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/about_project/jumbotron.css?x') }}" rel="stylesheet">
    <link href="{{ asset('css/backcolor.css') }}" rel="stylesheet">

    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/backgroundmove.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{ route('stations.aboutproject') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li><a class="nav-link" style="color: white;" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            <li><a class="nav-link" style="color: white;" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
            <li class="nav-item">
              <a class="nav-link" style="color: red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >{{__('Logout')}}</a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
            </li>
          @endguest
      </ul>
    </div>
    </nav>

    <div class="container">
      <div class="py-5 text-center">
        <p class="lead">{{__('Эта форма используется для просмотра станций. Также вы можете испольовать поиск станций о зонам, выбрав её из выпадающего списка.')}}</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">{{__('Zones')}}</span>
          </h4>
          <p class="lead">{{__('Выберите зону из списка, а затем нажмите на кнопку "Поиск" для того чтобы найти станции в выбранной зоне')}}</p>
          {{
              Form::open([
                  'method' => 'GET',
                  'route'  => 'stations.sortforanonym'
              ])
          }}
          {{ Form::select('zone_id', $zones, null, ['class' => 'custom-select d-block w-100'])}}
          <hr>
          {{
              Form::submit(
                  __('Search'),
                  [
                      'class' => 'btn btn-success btn-block',
                  ]
              )
          }} {{ Form::close() }}
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">{{__('Stations')}}</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Name zone') }}</th>
                  <th>{{ __('Price of tickets on zone') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($stations as $station)
                <tr>
                  <td>{{ Html::secureLink(
                      route('stations.showforanonym', $station->id),
                      $station->name
                  )}}</td>
                    <td>{{ $station->zone->name }}</td>
                    <td>{{ $station->zone->price }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Колганов Сергей, 2019</p>
      </footer>
    </div>
  </body>
</html>
