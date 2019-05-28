<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('Расписание')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/users/addcard.css?x') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body class="bg-light">
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
        <p></p>
        <img class="d-block mx-auto mb-4 img-fluid" src="/media/yandex_api.png" alt="" width="160" height="160">
        <h2>{{__('Расписание')}}</h2>
        <p class="lead" style="color: black !important;">{{__('Эта форма используется для просмотра расписания, вы можете выбрать станции, между которыми нужно просмотреть расписание, а также дату.')}}</p>
      </div>

      <div class="row">

      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">{{__('Примечание')}}</span>
        </h4>
          <p class="lead">{{__('Данная форма использует API Яндекс для просмотра расписания.')}}</p>
          <p class="lead">{{__('Наш сайт использует сервис "Яндекс" для парсинга расписания, это также удобно.')}}</p>
      </div>

    <div class="col-md-8 order-md-1">
      {{
          Form::open([
              'method' => 'GET',
              'route'  => 'rasps.raspget'
          ])
      }}
      <h4 class="mb-3">{{__('Расписание')}}</h4>
      @if ($errors->count())
          {{-- Перечень ошибок. --}}
          <div class="alert alert-danger">
              {{ Html::ul($errors->all()) }}
          </div>
      @endif
      <div class="row">
        <div class="col-md-6 mb-3">
        {{ Form::label('departure_station', __('Departure station')) }}
        <select name="departure_station" class="custom-select d-block w-100">
        <option value="s2000009">Москва Свёловская</option>
        <option value="s9602463">Тимирязевская</option>
        <option value="s9601830">Окружная</option>
        <option value="s9601117">Дегунино</option>
        <option value="s9601805">Бескудниково</option>
        <option value="s9600851">Лианозово</option>
        <option value="s9602214">Марк</option>
        <option value="s9601261">Новодачная</option>
        <option value="s9600766">Долгопрудная</option>
        <option value="s9601877">Водники</option>
        <option value="s9601281">Хлебниково</option>
        <option value="s9601996">Шереметьевская</option>
        <option value="s9600781">Лобня</option>
        <option value="s9602464">Депо</option>
        <option value="s9602070">Луговая</option>
        <option value="s9601757">Некрасовская</option>
        <option value="s9601271">Катуар</option>
        <option value="s9600679">Трудовая</option>
        <option value="s9601681">Икша</option>
        <option value="s9601673">Морозки</option>
        <option value="s9601484">Турист</option>
        <option value="s9601682">Яхрома</option>
        <option value="s9600692">Дмитров</option>
        <option value="s9601852">Каналстрой</option>
        <option value="s9601704">Пл. 75 км</option>
        <option value="s9601657">Орудьево</option>
        <option value="s9600693">Вербилки</option>
        <option value="s9602288">Пл. 94 км</option>
        <option value="s9601140">Власово</option>
        <option value="s9600686">Талдом</option>
        <option value="s9601895">Лебзино</option>
        <option value="s9633998">Пл. 124 км</option>
        <option value="s9603083">Савёлово</option>
        <option value="s9601875">Соревнование</option>
        <option value="s9602220">Запрудная</option>
        <option value="s9601819">Темпы</option>
        <option value="s9601807">Мельдино</option>
        <option value="s9602209">Пл. 119 км</option>
        <option value="s9601949">Карманово</option>
        <option value="s9601720">Большая Волга</option>
        <option value="s9601639">Дубна</option>
        </select>
        </div>
        <div class="col-md-6 mb-3">
        {{ Form::label('arrival_station', __('Arrival station')) }}
        <select name="arrival_station" class="custom-select d-block w-100">
          <option value="s2000009">Москва Свёловская</option>
          <option value="s9602463">Тимирязевская</option>
          <option value="s9601830">Окружная</option>
          <option value="s9601117">Дегунино</option>
          <option value="s9601805">Бескудниково</option>
          <option value="s9600851">Лианозово</option>
          <option value="s9602214">Марк</option>
          <option value="s9601261">Новодачная</option>
          <option value="s9600766">Долгопрудная</option>
          <option value="s9601877">Водники</option>
          <option value="s9601281">Хлебниково</option>
          <option value="s9601996">Шереметьевская</option>
          <option value="s9600781">Лобня</option>
          <option value="s9602464">Депо</option>
          <option value="s9602070">Луговая</option>
          <option value="s9601757">Некрасовская</option>
          <option value="s9601271">Катуар</option>
          <option value="s9600679">Трудовая</option>
          <option value="s9601681">Икша</option>
          <option value="s9601673">Морозки</option>
          <option value="s9601484">Турист</option>
          <option value="s9601682">Яхрома</option>
          <option value="s9600692">Дмитров</option>
          <option value="s9601852">Каналстрой</option>
          <option value="s9601704">Пл. 75 км</option>
          <option value="s9601657">Орудьево</option>
          <option value="s9600693">Вербилки</option>
          <option value="s9602288">Пл. 94 км</option>
          <option value="s9601140">Власово</option>
          <option value="s9600686">Талдом</option>
          <option value="s9601895">Лебзино</option>
          <option value="s9633998">Пл. 124 км</option>
          <option value="s9603083">Савёлово</option>
          <option value="s9601875">Соревнование</option>
          <option value="s9602220">Запрудная</option>
          <option value="s9601819">Темпы</option>
          <option value="s9601807">Мельдино</option>
          <option value="s9602209">Пл. 119 км</option>
          <option value="s9601949">Карманово</option>
          <option value="s9601720">Большая Волга</option>
          <option value="s9601639">Дубна</option>
        </select>
        </div>
      <div class="col-md-6 mb-3">
      <label for="datetimepicker1">{{__('Дата')}}</label>
      <input name="date" type="date" id="datetimepicker1" class="form-control">
      </div>
    </div>
    {{
        Form::submit(
            __('Получить расписание'),
            [
                'class' => 'btn btn-primary btn-lg btn-block',
            ]
        )
    }}

    {{ Form::close() }}
    <p></p>
    <div class="row">
    <div class="col-md-9 mb-3">
    <label style="font-size: 20px;">{{__('Вы смотрите расписание на дату: ')}}{{__($date)}}</label>
  </div>
</div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>{{ __('Путь') }}</th>
        <th>{{ __('Время отправления') }}</th>
        <th>{{ __('Время прибытия') }}</th>
      </tr>
    </thead>
    <tbody>
      <tbody>
        @for ($key = 0; $key < $total; $key++)
        <tr>
          <td>{{ $times['segments'][$key]['from']['title'] }}{{__(' - ')}}{{$times['segments'][$key]['to']['title'] }}</td>
            <td>{{ substr($times['segments'][$key]['departure'], 11, 5) }}</td>
            <td>{{ substr($times['segments'][$key]['arrival'], 11, 5) }}</td>
        </tr>
        @endfor
      </tbody>
    </tbody>
  </table>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; Колганов Сергей, 2019</p>
</footer>
</div>
</body>
</html>
