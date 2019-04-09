{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Ticket info check it! --}}
@section('title', __('Ticket info check it!'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

{{
    Form::model($ticket, [
        'method' => 'POST',
        'route'  => 'tickets.store'
    ])
}}

    {{-- Включаем шаблон resources/views/tickets/partials/forminfo.blade.php --}}
    @include('tickets.partials.forminfo')
    {{ Form::hidden('id', $ticket->id) }}
    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Buy ticket'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}

@endsection
