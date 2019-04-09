{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Add zone --}}
@section('title', __('Add card'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{
        Form::model($usercard, [
            'method' => 'POST',
            'route'  => 'cards.storecard'
        ])
    }}
    @include('users.partials.formcard')
    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save card'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
