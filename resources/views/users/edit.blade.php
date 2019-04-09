{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit zone --}}
@section('title', __('Edit zone'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб‑адрес: zones/ID, где ID ⁠— первичный ключ --}}
    {{
        Form::model($zone, [
            'method' => 'PUT',
            'route'  => [
                'zones.update',
                $zone->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/zones/partials/form.blade.php --}}
    @include('zones.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update zone'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
