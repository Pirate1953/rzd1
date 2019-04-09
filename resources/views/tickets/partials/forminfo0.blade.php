
<div class="form-group">
    {{ Form::label('departure_station', __('Departure station: ')) }}
    {{ ($ticket->departure_station1()->name) }}
</div>

<div class="form-group">
    {{ Form::label('arrival_station', __('Arrival station: ')) }}
    {{ ($ticket->arrival_station1()->name) }}
</div>

<div class="form-group">
    {{ Form::label('type_id', __('Type of ticket: ')) }}
    {{ ($ticket->type->name) }}
</div>

<div class="form-group">
    {{ Form::label('user_id', __('Your name: ')) }}
    {{ ($ticket->user->name) }}
</div>

<div class="alert alert-success" role="alert">
    <strong>{{__('Fin price: ')}}</strong>
    {{ ($ticket->price) }}
</div>

<div class="form-group">
    {{ Form::label('type_id', __('Type of ticket: ')) }}
    {{ ($ticket->type->name) }}
</div>
