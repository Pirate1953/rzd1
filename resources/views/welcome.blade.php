<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>RZDBK</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/welcome_Cover/welcomepagecover.css?x') }}" rel="stylesheet">
    <script defer src="{{ asset('js/particles.js') }}"></script>
    <script defer src="{{ asset('js/myparticles.js') }}"></script>
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body class="text-center">

  <div id="particles-js"></div>

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="{{route('register')}}" style="border-bottom-color: transparent;">{{__('Register')}}</a>
            <a class="nav-link active" href="{{route('login')}}" style="border-bottom-color: transparent;">{{__('Login')}}</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">-RZDBK-</h1>
        <p class="lead">{{ __('В настоящее время, пассажир может приобрести билет на поезд через интернет, однако, далеко не на все поезда получается купить билет. Только на поезда дальнего следования, экспрессы и аэроэкспрессы.
Исходя из этого, возникла идея создать специализированный сайт, на котором можно будет купить билет и на электричку. Для этого нужно всего лишь зарегистрироваться. С данным WEB – приложением больше не понадобиться стоять длинные очереди в кассах и в электронных кассах. Эта проблема заставляет людей выходить раньше из дома, а потом стоять на платформе и ожидать поезда, как холодной зимой, так и жарким летом.
«RZDBK» – это приложение, предназначенное для формирования структуры и покупки билета на проезд в железнодорожном транспорте.
') }}</p>
        <p class="lead">
          <a href="{{ route('stations.aboutproject') }}" class="btn btn-lg btn-primary">{{ __('About project') }}</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner" style="font-size: 20px;">
          <p>&copy; <a href="https://vk.com/id266651087">Колганов Сергей</a>, 2019.</p>
        </div>
      </footer>
    </div>
  </body>
</html>
