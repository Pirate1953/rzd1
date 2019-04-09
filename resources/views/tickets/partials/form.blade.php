<h4 class="mb-3">{{__('Билет')}}</h4>
@if ($errors->count())
    {{-- Перечень ошибок. --}}
    <div class="alert alert-danger">
        {{ Html::ul($errors->all()) }}
    </div>
@endif
  <div class="row">
    <div class="col-md-6 mb-3">
    {{ Form::label('departure_station', __('Departure station')) }}
    {{ Form::select('departure_station', $stations, null, ['class' => 'custom-select d-block w-100'])}}
    </div>
    <div class="col-md-6 mb-3">
    {{ Form::label('arrival_station', __('Arrival station')) }}
    {{ Form::select('arrival_station', $stations, null, ['class' => 'custom-select d-block w-100'])}}
    </div>

    <div class="col-md-6 mb-3">
    <label for="datetimepicker1">{{__('Start date: ')}}</label>
    <input name="start_date" type="date" id="datetimepicker1" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
    <label for="datetimepicker2">{{__('End date: ')}}</label>
    <input name="end_date" type="date" id="datetimepicker2" class="form-control">
    </div>
  </div>

    {{ Form::label('type_id', __('Types of tickets')) }}
    {{ Form::select('type_id', $types, null, ['class' => 'custom-select d-block w-100'])}}
    <hr>
