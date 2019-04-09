{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<p>
  <a class="btn btn-danger" href="{{route('stations.indexforusers')}}">{{__('Go back')}}</a>
</p>

<div class="form-group">
    {{ Form::label('departure_station', __('Departure station')) }}
    {{ Form::select('departure_station', $stations)}}
</div>

<div class="form-group">
    {{ Form::label('arrival_station', __('Arrival station')) }}
    {{ Form::select('arrival_station', $stations)}}
</div>

<div class="form-group">
    {{ Form::label('type_id', __('Types of tickets')) }}
    {{ Form::select('type_id', $types)}}
</div>
