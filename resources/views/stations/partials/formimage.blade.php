<h4 class="mb-3">{{__('Информация о станции')}}</h4>
@if ($errors->count())
    {{-- Перечень ошибок. --}}
    <div class="alert alert-danger">
        {{ Html::ul($errors->all()) }}
    </div>
@endif

    {{ Form::file('filename', null, ['class' => 'form-control']) }}

    {{ Form::hidden('station_id', $station->id, ['class' => 'form-control']) }}
    <hr>
