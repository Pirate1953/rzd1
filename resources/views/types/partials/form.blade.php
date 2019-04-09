<h4 class="mb-3">{{__('Информация о типе билета')}}</h4>
@if ($errors->count())
    {{-- Перечень ошибок. --}}
    <div class="alert alert-danger">
        {{ Html::ul($errors->all()) }}
    </div>
@endif

    {{ Form::label('name', __('Name')) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}

    {{ Form::label('number', __('Number')) }}
    {{ Form::number('number', null, ['class' => 'form-control', 'required' => 'required']) }}
    <hr>
