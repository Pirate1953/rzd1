{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Zones --}}
@section('title', __('Zones'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<div class="row">
    <div class="col">
        <div class="container-fluid 3">
          {{
              Form::open([
                  'method' => 'GET',
                  'route'  => 'zones.sort'
              ])
          }}
              {{ Form::label('lab1', __('Set price')) }}
              {{ Form::number('price', null, ['class' => 'form-control']) }}
              <p></p>
              {{
                  Form::submit(
                      __('Search'),
                      [
                          'class' => 'btn btn-success',
                      ]
                  )
              }}
              {{ Form::close() }}
        </div>
    </div>
    <div class="col">
        <div class="container-fluid 3">
        </div>
    </div>
    <div class="border border-grey col-3 justify-content-center text-center">
      <a class="label label-default">{{__('Functions')}}</a>
      <p>
        <a class="col btn btn-danger" href="{{route('stations.index')}}">{{__('Tokens')}}</a>
      </p>
      <p>
        <a class="col btn btn-primary" href="{{route('users.usersindex')}}">{{__('Users')}}</a>
      </p>
    </div>

    <div class="border border-grey col-3 justify-content-center text-center">
      <a class="label label-default">{{__('Navigation')}}</a>
      <p>
      <a class="col btn btn-success" href="{{route('zones.index')}}">{{__('Zones')}}</a>
    </p>
    <p>
      <a class="col btn btn-success" href="{{route('types.index')}}">{{__('Types of tickets')}}</a>
    </p>
    <p>
      <a class="col btn btn-success" href="{{route('stations.index')}}">{{__('Stations')}}</a>
    </p>
    </div>
</div>
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('zones.create'),
                __('Add zone')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Number') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($zones as $zone)
                <tr>
                    <td>{{ $zone->name }}</td>
                    <td>{{ $zone->number }}</td>
                    <td>{{ Html::secureLink(
                        route('zones.edit', $zone->id),
                        __('Edit zone')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('zones.remove', $zone->id),
                        __('Remove zone')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$zones->links()}}
@endsection
