{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Zones --}}
@section('title', __('Cards'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
<p>
    <a class="btn btn-danger" href="{{route('cards.createcard')}}">{{__('Go back')}}</a>
</p>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Number') }}</th>
                <th>{{ __('Paymethod') }}</th>
                <th>{{ __('Registration date') }}</th>
                <th></th>
            </tr>
            @foreach ($cards as $card)
                <tr>
                    <td>{{ $card->number }}</td>
                    <td>{{ $card->paymethod->name }}</td>
                    <td>{{ $card->created_at }}</td>
                    <td>
                      {{
                          Form::model($card, [
                              'method' => 'DELETE',
                              'route'  => [
                                  'cards.destroycard',
                                  $card->id,
                              ]
                          ])
                      }}
                      {{
                          Form::submit(
                              __('Remove card'),
                              [
                                  'class' => 'btn btn-block btn-danger',
                              ]
                          )
                      }}
                      {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$cards->links()}}
@endsection
