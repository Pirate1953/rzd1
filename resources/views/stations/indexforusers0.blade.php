{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Stations --}}
@section('title', __('Stations'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<div class="border border-grey col-3 justify-content-center text-center">
  <a class="label label-default">{{__('Service')}}</a>
  <p>
    <a class="btn btn-success" href="{{route('tickets.prepare')}}">{{__('Buy tickets')}}</a>
  </p>
  <p>
    <a class="btn btn-success" href="{{route('tickets.historyticketusers')}}">{{__('History')}}</a>
  </p>
</div>
<div class="border border-grey col-3 justify-content-center text-center">
  <a class="label label-default">{{__('Work with account')}}</a>
  <p>
    <a class="btn btn-primary" href="{{route('users.editstat')}}">{{__('Change status')}}</a>
  </p>
</div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Name zone') }}</th>
                <th>{{ __('Price of tickets on zone') }}</th>
            </tr>
            @foreach ($stations as $station)
                <tr>
                  <td>{{ Html::secureLink(
                      route('stations.showforusers', $station->id),
                      $station->name
                  )}}</td>
                    <td>{{ $station->zone->name }}</td>
                    <td>{{ $station->zone->price }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$stations->links()}}
@endsection
