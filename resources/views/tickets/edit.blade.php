{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Edit type'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($type, [
            'method' => 'PUT',
            'route'  => [
                'types.update',
                $type->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/products/partials/form.blade.php --}}
    @include('types.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update type'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
