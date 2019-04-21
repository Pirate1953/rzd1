<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>{{__('About project')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/about_project/jumbotron.css?x') }}" rel="stylesheet">

    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/backgroundmove.js') }}"></script>
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
          <h1 class="display-3">{{__('RZDBK')}}</h1>
          <p>{{__('Это удобное веб-приложене для заказа билетов на поезда, а также, своего рода мини справочник по станциям на савёловском направлении. Чтобы начать пользоваться в полной мере нашим сервисовм, вам необходимо пройти регистрацию, если у вас ещё нет акканута.')}}</p>
          <p><a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">{{__('Начать пользоваться')}} &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Как работаем?</h2>
            <p>{{__('В этом разделе, в простой форме расписано то, как происходит взаимодействие пользователей и системы.')}}</p>
            <p><a href="{{ route('stations.stages') }}" class="btn btn-secondary" style="background-color: green;" href="#" role="button">{{__('More')}} &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>{{__('Stations')}}</h2>
            <p>{{__('В этом разделе представлен список станций, информацию о которых можно узнать просто нажав на кнопку "Подробнее" ниже.')}}</p>
            <p><a class="btn btn-secondary" style="background-color: green;" href="{{ route('stations.indexforanonym') }}" role="button">{{__('More')}} &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>{{__('Расписание')}}</h2>
            <p>{{__('В этом разделе вы сможете просмотреть расписание электричек на савёловском направлени.')}}</p>
            <p><a class="btn btn-secondary" style="background-color: green;" href="{{ route('rasps.raspmain') }}" role="button">{{__('More')}} &raquo;</a></p>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">{{__('Простота и удобства пользования.')}}</h2>
            <p class="lead">{{__('Использование QR-кодов для хранения данных о билете позволяет быстро считать информацию. Вдобавок к этому, QR-код можно хранить на цифровом носителе и просто поднести его к сканеру, что также упрощает жизнь. QR-код был разработан и представлен японской компанией Denso-Wave в 1994 году. В отличие от старого штрихкода, который сканируют тонким лучом, QR-код определяется датчиком или камерой как двумерное изображение. Три квадрата в углах изображения и меньшие синхронизирующие квадратики по всему коду позволяют нормализовать размер изображения.')}}</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto rounded" src="/rzd1/storage/app/qr-code.jpg" width="300" height="300" alt="QR-code">
          </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">{{__('Новые технологии вступают в нашу жизнь.')}}</h2>
            <p class="lead">{{__('Появляются новые кассы и новые билеты и новые поезда. QR-коды всё чаще начинают использовать в различных сферах деятельности. Так, например, для оплаты проезда на аэроэкспессе необходимо приобрести билет, который также имеет Qr-код.')}}</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto rounded" src="/rzd1/storage/app/aero.jpg" alt="Train">
          </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">{{__('Безопасность пользователей.')}}</h2>
            <p class="lead">{{__('Все данные пользователей хранятся в наше базе данных, новым зарегистрированным пользователям необходимо будет предоставить свои паспортные данные, чтобы наши администраторы проверили и дали им досутп ко всем функциям сайта. Безопасность превыше всего!')}}</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto rounded" src="/rzd1/storage/app/secure.jpg" width="300" height="300" alt="QR-code">
          </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">{{__('Интеграция.')}}</h2>
            <p class="lead">{{__('Наш сайт использует сервис "Яндекс" для парсинга расписания, это также удобно. Наши пользователи могут заказывать билеты на проезд, а также смотреть расписание электропоездов. В наших интересах, в скором времени подключить Яндекс Карты для отображения станций, это поможет найти более удобный путь прохода к станциям.')}}</p>
          </div>
          <div class="col-md-4 order-md-1">
            <img class="featurette-image img-fluid mx-auto rounded" src="/rzd1/storage/app/yandex.png" width="300" height="300" alt="Yandex">
          </div>
        </div>
        <hr>
      </div> <!-- /container -->
    </main>
  </body>
  <footer class="container">
    <p>&copy; Колганов Сергей, 2019</p>
  </footer>
</html>
