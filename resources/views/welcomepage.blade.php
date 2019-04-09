
<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RZDBK</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <style>
body{
  background-size: cover !important;
  background-repeat: no-repeat !important;
  background: url("/rzd1/storage/app/railway.jpg");
  background-attachment: fixed;
  background-position: center center;
}
.footer {
  background-color: #343a40;
}
.labelfooter{
  color: white !important;
}
.desclabel{
  font-size: 20px;
  color: white !important;
}
.mainlabel{
  font-size: 100px;
  color: white !important;
  text-align: center  ;
}
.links a{
  color: #fff;
}
.links{
  text-align: right;
}
/* The Close Button */
.close {
  /* Position it in the top right corner outside of the modal */
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
  color: red !important;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}
.modal{
  display: none;
}
    </style>
    <script>
    // Get the modal
    var modal = 'id01';

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target.id == modal) {
        event.target.style.display = "none";
      }
      else{
        event.target.style.display = "block";
      }
    }
    </script>
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container" >
    <div id="id01" class="modal w-50 mx-auto" style="left: 25%; top: 20%; ">
      <form class="modal-content animate" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Закрыть окно">&times;</span>
        </div>

        <div class="container w-50">
          <p></p>
          <label for="email">{{ __('E-Mail Address') }}</label>
          <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

          <label for="psw">{{ __('Password') }}</label>
          <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

          <p></p>
          <button type="submit" class="btn btn-block btn-primary">
              {{ __('Login') }}
          </button>
          <p></p>
        </div>
      </form>
    </div>
    <div class="links">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('redir') }}">Вернуться</a>
                @else
                    <a href="{{ route('login') }}">Войти</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                @endauth
            </div>
        @endif
      </div>
    </div>

        <div class="content">
        <h1>  <a class="mainlabel">{{ __('-RZDBK-') }}</a></h1>

<div class="row">
          <div class="btn-group container w-50" role="group" aria-label="Basic example">
            <a class="btn btn-success" href="{{route('stations.indexforanonym')}}">{{__('Посмотреть список станций')}}</a>
            <button class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'">{{__('Login')}}</button>
          </div>
</div>
            <div class="row">
                <div class="col">
                  <div class="container-fluid">
                    <a class="desclabel">{{ __('В настоящее время, пассажир может приобрести билет на поезд через интернет, однако, далеко не на все поезда получается купить билет. Только на поезда дальнего следования, экспрессы и аэроэкспрессы.
Исходя из этого, возникла идея создать специализированный сайт, на котором можно будет купить билет и на электричку. Для этого нужно всего лишь зарегистрироваться. С данным WEB – приложением больше не понадобиться стоять длинные очереди в кассах и в электронных кассах. Актуальность данной проблемы заставляет людей выходить раньше из дома, а потом стоять на платформе и ожидать поезда, как холодной зимой, так и жарким летом.
«RZDBK» – это приложение, предназначенное для формирования структуры и покупки билета на проезд в железнодорожном транспорте.
') }}</a>
                  </div>
                </div>
              </div>
    </div>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container-fluid">
    <span class="labelfooter">Place sticky footer content here.</span>
  </div>
</footer>
</body>
</html>
