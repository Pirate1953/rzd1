{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Add zone --}}
@section('title', __('Add zone'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут zones.store --}}
    {{
        Form::model($zone, [
            'method' => 'POST',
            'route'  => 'zones.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/zones/partials/form.blade.php --}}
    @include('zones.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save zone'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
