{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: History --}}
@section('title', __('History'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<p>
  <a class="btn btn-danger" href="{{route('stations.indexforusers')}}">{{__('Go back')}}</a>
</p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Ticket number: ') }}</th>
                <th>{{ __('Price: ') }}</th>
                <th>{{ __('Departure station: ') }}</th>
                <th>{{ __('Arrival station: ') }}</th>
            </tr>
            @foreach ($tickets as $ticket)
                <tr>
                  <td>{{ Html::secureLink(
                      route('tickets.showfinal', $ticket->id),
                      $ticket->id
                  )}}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->departure_station1()->name }}</td>
                    <td>{{ $ticket->arrival_station1()->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
