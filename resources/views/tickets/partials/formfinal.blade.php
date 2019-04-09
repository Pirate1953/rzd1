<div class="row">
    <div class="col-md-0">
        <div class="container-fluid 3">
        </div>
    </div>

<div class="card" style="width: 26rem;">
  <div class="card-body">
  <h5 class="card-title">{{__('Ticket number: ')}} {{ ($ticket->id) }}</h5>
  <h6 class="card-text">{{__('Departure station: ')}} {{ ($ticket->departure_station1()->name) }}</h6>
  <h6 class="card-text">{{__('Arrival station: ')}} {{ ($ticket->arrival_station1()->name) }}</h6>
  <h6 class="card-text">{{__('Type of ticket: ')}} {{ ($ticket->type->name) }}</h6>
  <h6 class="card-text">{{__('Customer: ')}} {{ ($ticket->user->name) }}</h6>
  <h6 class="card-text">{{__('Price: ')}} {{ ($ticket->price) }}</h6>
  <h6 class="card-text">{{__('Start date: ')}} {{ ($ticket->start_date) }}</h6>
  <h6 class="card-text">{{__('End date: ')}} {{ ($ticket->end_date) }}</h6>
  <h6 class="card-text">{{__('Zone 1: ')}} {{ ($ticket->departure_station1()->zone->name) }}</h6>
  <h6 class="card-text">{{__('Zone 2: ')}} {{ ($ticket->arrival_station1()->zone->name) }}</h6>
  <h6 class="card-text">{{__('Pay status: ')}} {{ ($ticket->paystatus()->name) }}</h6>
</div>
</div>

<div class="card" style="width: 13rem;">
  <div class="card-body">
  <h3 class="card-title font-weight-bold">{{__('№: ')}} {{ ($ticket->id) }}</h3>
  <h6 class="card-text font-weight-bold">{{__('ОТПРСТ: ')}} {{ ($ticket->departure_station1()->number) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('ПРИБСТ: ')}} {{ ($ticket->arrival_station1()->number) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('Т: ')}} {{ ($ticket->type->number) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('ПОК: ')}} {{ ($ticket->user->id) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('ЦЕНН: ')}} {{ ($ticket->price) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('ДАТНАЧ: ')}} {{ ($ticket->start_date) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('ДАТКОН: ')}} {{ ($ticket->end_date) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('1: ')}} {{ ($ticket->departure_station1()->zone->number) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('2: ')}} {{ ($ticket->arrival_station1()->zone->number) }}</h6>
  <h6 class="card-text font-weight-bold">{{__('СО: ')}} {{ ($ticket->paystatus()->id) }}</h6>
</div>
</div>
<a class="btn mt-2 btn-primary" href="data:image/png;base64, {!! $qr !!}" download>
<img src="data:image/png;base64, {!! $qr !!}" alt="QR" width="300" height="300">
</a>
</div>

<p>
  <a class="btn mt-2 btn-success" href="{{route('stations.indexforusers')}}">{{__('Go back')}}</a>
</p>
