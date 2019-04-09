<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/rzd1/storage/app/icon.ico">

    <title>{{__('Наша команда')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/about_project/stages.css?x') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{route('stations.aboutproject')}}">{{ config('app.name', 'Laravel') }}</a>
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

  <section id="team" class="pb-5">
      <div class="container">
          <h5 class="section-title h1">{{__('Порядок работы')}}</h5>
          <div class="row">

              <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="/rzd1/storage/app/idea.jpg" alt="card image"></p>
                                      <h4 class="card-title">{{__('Шаг 1')}}</h4>
                                      <p class="card-text">{{__('Регистрация в системе.')}}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="backside">
                              <div class="card">
                                  <div class="card-body text-center mt-4">
                                      <h4 class="card-title">{{__('Шаг 1')}}</h4>
                                      <p class="card-text">{{__('Для того чтобы начать работу с нашим приложением, вам необходимо пройти простую регистрацию, это не займёт много времени.')}}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="/rzd1/storage/app/user.png" alt="card image"></p>
                                      <h4 class="card-title">{{__('Шаг 2')}}</h4>
                                      <p class="card-text">{{__('Подтверждение своей личности.')}}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="backside">
                              <div class="card">
                                  <div class="card-body text-center mt-4">
                                      <h4 class="card-title">{{__('Шаг 2')}}</h4>
                                      <p class="card-text">{{__('Чтобы получить полный доступ к функциям приложения (привязка карточек оплаты к аккаунту), вам необходимо предоставить свои паспортные данные.')}}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="/rzd1/storage/app/work.jpg" alt="card image"></p>
                                      <h4 class="card-title">{{__('Шаг 3')}}</h4>
                                      <p class="card-text">{{__('Профит!!!')}}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="backside">
                              <div class="card">
                                  <div class="card-body text-center mt-4">
                                      <h4 class="card-title">{{__('Шаг 3')}}</h4>
                                      <p class="card-text">{{__('Теперь вы можете заказывать билеты на электричку и оплачивать их, всё просто!')}}</p>
                                      <a class="btn btn-lg btn-success btn-block" style="color: white !important;" href="{{route('register')}}">{{__('Начать работу')}}</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</body>
<footer class="container">
  <p style="text-align: center;">&copy; Колганов Сергей, 2019</p>
</footer>
</html>
