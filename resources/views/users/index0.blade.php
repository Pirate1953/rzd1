{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Zones --}}
@section('title', __('Users'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<p>
  <a class="btn btn-danger" href="{{route('zones.index')}}">{{__('Go back')}}</a>
</p>
<p>
  <a class="btn btn-success" href="{{route('users.usersindex')}}">{{__('Inactive accounts')}}</a>
</p>
<p>
  <a class="btn btn-primary" href="{{route('users.indexact')}}">{{__('Active accounts')}}</a>
</p>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Second Name') }}</th>
                <th>{{ __('Patronymic') }}</th>
                <th>{{ __('Role') }}</th>
                <th>{{ __('Account status') }}</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                  <td>{{ Html::secureLink(
                      route('users.editrole', $user->id),
                      $user->name
                  )}}</td>
                    <td>{{ $user->fam }}</td>
                    <td>{{ $user->patr }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->userstat->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$users->links()}}
@endsection
