
<div class="form-group">
    {{ Form::label('departure_station', __('Departure station: ')) }}
    <strong>{{ ($ticket->departure_station1()->name) }}</strong>
</div>

<div class="form-group">
    {{ Form::label('arrival_station', __('Arrival station: ')) }}
    <strong>{{ ($ticket->arrival_station1()->name) }}</strong>
</div>

<div class="form-group">
    {{ Form::label('user_id', __('Your name: ')) }}
    <strong>{{ ($ticket->user->name) }}</strong>
</div>

<div class="form-group">
    {{ Form::label('type_id', __('Type of ticket: ')) }}
    <strong>{{ ($ticket->type->name) }}</strong>
</div>

<div class="form-group" style="color: red; font-size: 30px;">
    {{__('Fin price: ')}}
    <strong>{{ ($ticket->price) }}</strong>
</div>
