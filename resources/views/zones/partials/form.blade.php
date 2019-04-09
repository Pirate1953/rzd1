<h4 class="mb-3">{{__('Информация о зоне')}}</h4>
@if ($errors->count())
    {{-- Перечень ошибок. --}}
    <div class="alert alert-danger">
        {{ Html::ul($errors->all()) }}
    </div>
@endif

  <label>{{__('Name')}}</label>
  {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}

  <label>{{__('Number')}}</label>
  {{ Form::text('number', null, ['class' => 'form-control', 'required' => 'required']) }}

  <label>{{__('Price')}}</label>
  {{ Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) }}
  <hr>
