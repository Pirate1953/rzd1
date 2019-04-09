{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Stations --}}
@section('title', __('Stations'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

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
