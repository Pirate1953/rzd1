{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Remove zone --}}
@section('title', __('Remove zone'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<p>
  <a class="btn btn-danger" href="{{route('zones.index')}}">{{__('Go back')}}</a>
</p>

    {{-- Форма предъявляется методом HTTP DELETE на веб‑адрес: zones/ID, где ID ⁠— первичный ключ --}}
    {{
        Form::model($zone, [
            'method' => 'DELETE',
            'route'  => [
                'zones.destroy',
                $zone->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    <div class="form-group">
        {{-- Метка к полю ввода наименования --}}
        {{-- На метке будет выведен перевод слова Name --}}
        {{ Form::label('name', __('Name')) }}

        {{-- Поле ввода наименования товара --}}
        {{ Form::text('name', null, ['class' => 'form-control', 'disabled']) }}
    </div>

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove zone'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
