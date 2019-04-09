{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove type'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<p>
  <a class="btn btn-danger" href="{{route('types.index')}}">{{__('Go back')}}</a>
</p>

    {{-- Форма предъявляется методом HTTP DELETE на веб‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($type, [
            'method' => 'DELETE',
            'route'  => [
                'types.destroy',
                $type->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}
    <div class="form-group">
        {{-- Метка к полю ввода наименования товара --}}
        {{-- На метке будет выведен перевод слова Title --}}
        {{ Form::label('name', __('Name')) }}

        {{-- Поле ввода наименования товара --}}
        {{ Form::text('name', null, ['class' => 'form-control', 'disabled']) }}
    </div>

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove type'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
