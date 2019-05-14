<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('О мобильном приложении')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/about_project/jumbotron_mob.css?x') }}" rel="stylesheet">

    <script defer src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{ route('welcomepage') }}">{{ config('app.name', 'Laravel') }}</a>
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

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">{{__('RZDBK Mobile')}}</h1>
          <p>{{__('У нас есть мобильное приложение, которое является портативным иснструментом для осуществения заказа проездных документов. Также через мобильное приложение доступна функция просмотра расписания.')}}</p>
          <p><a class="btn btn-success btn-lg" href="#" role="button">{{__('Скачать')}}</a></p>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-3 text-center">
          </div>
          <div class="col-md-6 text-center">
            <img src="/media/dashboard_ico/download_ico.png" width="140" height="140" class="img-fluid rounded-circle" alt="Users">
            <h2>{{__('Первый шаг')}}</h2>
            <p>{{__('Установить приложение')}}</p>
          </div>
          <div class="col-md-3 text-center">
          </div>
          <div class="col-md-3 text-center">
            <img src="/media/dashboard_ico/User_ico.png" width="140" height="140" class="img-fluid rounded-circle" alt="Users">
            <h2>{{__('Второй шаг')}}</h2>
            <p>{{__('Пройти авторизацию (вам нужно быть зарегистрированнымв в системе)')}}</p>
          </div>
          <div class="col-md-6 text-center">
          </div>
          <div class="col-md-3 text-center">
            <img src="/media/yandex_api.png" width="140" height="140" class="img-fluid rounded-circle" alt="Users">
            <h2>{{__('Третий шаг')}}</h2>
            <p>{{__('Посмотреть актуальное расписание рейсов')}}</p>
          </div>
          <div class="col-md-3 text-center">
          </div>
          <div class="col-md-6 text-center">
            <img src="/media/dashboard_ico/Type_ico_dark.png" width="140" height="140" class="img-fluid rounded-circle" alt="Users">
            <h2>{{__('Четвёртый шаг')}}</h2>
            <p>{{__('Приобрести билет, ПРОФИТ!!!')}}</p>
          </div>
          <div class="col-md-3 text-center">
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
          <div class="col-md-8">
            <h2 class="featurette-heading">{{__('Преимущества мобильного приложения.')}}</h2>
            <p class="lead">{{__('Использование мобильного приложения является одним из вариантов коммуникации с нашей системой. Предположим, чтобы попасть на сайт пользователю нужно открыть браузер и ввести адрес. Казалось бы, что здесь сложного? Однако уже на этом этапе возникают неприятности. Человек обычно помнит название компании, а не конкретный URL-адрес. Поэтому, если ввести название компании в поисковую строку, браузер выдаст результаты поиска по запросу. В этом случае нет гарантий, что сайт нужной компании окажется первым в списке, тут то и приходит на помощь мобильное приложение.')}}</p>
          </div>
          <div class="col-md-4">
            <img class="featurette-image img-fluid mx-auto rounded" src="/media/android_ico.png" width="300" height="300" alt="android">
          </div>
        </div>
        <hr class="featurette-divider">
      </div> <!-- /container -->
    </main>
  </body>
  <footer class="container">
    <p>&copy; Колганов Сергей, 2019</p>
  </footer>
</html>
