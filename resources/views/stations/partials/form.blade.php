<h4 class="mb-3">{{__('Информация о станции')}}</h4>
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

    {{ Form::label('zone_id', __('ID of zone')) }}
    {{ Form::select('zone_id', $zones, null, ['class' => 'custom-select d-block w-100'])}}

    {{ Form::label('description', __('Description')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) }}
    <hr>
