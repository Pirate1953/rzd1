
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/media/icon.ico">

    <title>{{__('Passport data')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/v.4.0.0-alpha-6-bootstrap.min.css?x') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/users/addcard.css?x') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body class="bg-light">
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
      </div>
    </nav>


    <div class="container">
      <div class="py-5 text-center">
        <p></p>
        <img class="d-block mx-auto mb-4" src="/media/gerb.png" alt="" width="400" height="130">
        <h2>{{__('Passport data')}}</h2>
        <p class="lead">Введите свои паспортные данные для отправки на сервер. После того, как админитстратор поверит их и подтвердит, вы смыжоте привязывать карточки к аккаунту и использовать их при оплате.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">{{__('ВАЖНО!!!')}}</span>
          </h4>
          <p class="lead">{{__('Вы должны указать действительные данные своего пасспорта!')}}</p>
          <p class="lead">{{__('Наши работники стараются тщательно всё проверять.')}}</p>
          <p class="lead" style="color: red;">{{__('Использование фальшивых документов, в соответствии с законом, уголовно наказуемо!')}}</p>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">{{__('Личная информаця')}}</h4>
          @if ($errors->count())
              {{-- Перечень ошибок. --}}
              <div class="alert alert-danger">
                  {{ Html::ul($errors->all()) }}
              </div>
          @endif
            {{
                Form::model($user, [
                    'method' => 'PUT',
                    'route'  => [
                        'users.updatestat',
                        $user->id,
                    ], 'class' => 'needs-validation'
                ])
            }}
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="passnumber">{{ __('Passport number:') }}</label>
                <input type="number" class="form-control" id="passnumber" name="passnumber" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="passser">{{ __('Passport series:') }}</label>
                <input type="number" class="form-control" id="passser" name="passser" required>
              </div>
            </div>

            <label for="issuedby">{{ __('Passport issued by:') }}</label>
            <input type="text" class="form-control" id="issuedby" name="issuedby" required>
            <hr>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="unitcode">{{ __('Unit code:') }}</label>
                <input type="text" class="form-control" id="unitcode" name="unitcode" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="city">{{ __('City:') }}</label>
                <input type="text" class="form-control" id="city" name="city" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="issuedate">{{ __('Date of issue:') }}</label>
                <input type="date" class="form-control" id="issuedate" name="issuedate" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="datebirth">{{ __('Date of birth:') }}</label>
                <input type="date" class="form-control" id="datebirth" name="datebirth" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="datebirth">{{ __('Gender:') }}</label>
                {{ Form::select('gender_id', $gender, null, ['class' => 'form-control'])}}
              </div>
              <div class="col-md-6 mb-3">
                <label>{{ __('Обработка персональных данных') }}</label>
                <label><input type="checkbox" name="agree">{{__(' Я согласен')}}</label>
              </div>
            </div>
            {{
                Form::submit(
                    __('Save'),
                    [
                        'class' => 'btn btn-primary btn-lg btn-block',
                    ]
                )
            }}
          {{ Form::close() }}
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Колганов Сергей, 2019</p>
      </footer>
    </div>
  </body>
</html>
