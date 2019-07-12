<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Ticket;
use App\Station;
use App\Usercard;
use App\Zone;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\StoreTicketRequest2;

class TicketController extends Controller
{
  public function __construct()
   {
     $this->authorizeResource(Ticket::class);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function historyticketusers(Ticket $ticket, Request $request)
    {
      $this->authorize('create', $ticket);//ПРОВЕРКА РОЛИ ПОЛЬЗОВАТЕЛЯ
      $tickets = Ticket::where('tickets.user_id', '=', $request->user()->id)->where('pay_status', '=', 5647)->orderBy('id', 'ASC');
      if ($request->wantsJson())
      {
      return $tickets
          ->leftJoin('stations AS d', 'tickets.departure_station', '=', 'd.id')
          ->leftJoin('stations AS a', 'tickets.arrival_station',  '=', 'a.id')
          ->leftJoin('types AS t', 'tickets.type_id', '=', 't.id')
          ->leftJoin('users AS u', 'tickets.user_id', '=', 'u.id')
          ->get([
            'd.name AS departure_station_name',
            'a.name AS arrival_station_name',
            't.name AS type_name',
            'u.name AS user_name',
            'tickets.*'
          ])
          ->toJson(JSON_UNESCAPED_UNICODE);
      }
      else
      {
        return view('tickets.historyticketusers')->withTickets($tickets->get());
      }
    }

    public function indexcardmobile(Ticket $ticket, Request $request)
    {
      $this->authorize('create', $ticket);//ПРОВЕРКА РОЛИ ПОЛЬЗОВАТЕЛЯ
      $userid = $request->user()->id;
      $cards = Usercard::where('user_id', '=', $userid)->orderBy('number')->get();
      return $cards->toJson(JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prepare(Ticket $ticket, Request $request)
    {
      $this->authorize('create', $ticket);
      $userid = $request->user()->id;
      $cards = Usercard::where('user_id', '=', $userid)->orderBy('number')->pluck('number', 'id');
      if ($request->wantsJson())
      {
        $types = Type::orderBy('id');
        return $types->get()->toJson(JSON_UNESCAPED_UNICODE);
      }
      else
      {
        $ticket = new Ticket();
        $stations = Station::orderBy('number')->pluck('name', 'id');
        $types = Type::orderBy('id')->pluck('name', 'id');
        return view('tickets.prepare', compact('ticket', 'stations', 'types', 'cards'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prepareview(StoreTicketRequest $request, Ticket $ticket)
    {
      $this->authorize('create', $ticket);
      $ticket = new Ticket();
      $price = 0;
      $preinf = $request->only(['departure_station', 'arrival_station', 'type_id']);
      $departure_station = Station::findOrFail($preinf['departure_station']);
      $arrival_station = Station::findOrFail($preinf['arrival_station']);
      $type_id = Type::findOrFail($preinf['type_id']);
      $preinf['user_id'] = $request->user()->id;
      $user_id = User::findOrFail($preinf['user_id']);

      if ((($departure_station->number == 34) || ($departure_station->number == 35) || ($departure_station->number == 36) || ($departure_station->number == 37)
      || ($departure_station->number == 38) || ($departure_station->number == 39) || ($departure_station->number == 40) || ($departure_station->number == 41))
      && (($arrival_station->number == 28) || ($arrival_station->number == 29) || ($arrival_station->number == 30) || ($arrival_station->number == 31)
      || ($arrival_station->number == 32) || ($arrival_station->number == 33)))
      {
        return view('tickets.noway');//ЕСЛИ БИЛЕТОВ В ТАКОМ НАПРАВЛЕНИИ НЕТ
      }

      if ((($departure_station->number == 28) || ($departure_station->number == 29) || ($departure_station->number == 30)
      || ($departure_station->number == 31) || ($departure_station->number == 32) || ($departure_station->number == 33))
      && (($arrival_station->number == 34) || ($arrival_station->number == 35) || ($arrival_station->number == 36) || ($arrival_station->number == 37) || ($arrival_station->number == 38)
      || ($arrival_station->number == 39) || ($arrival_station->number == 40) || ($arrival_station->number == 41)))
      {
        return view('tickets.noway');//ЕСЛИ БИЛЕТОВ В ТАКОМ НАПРАВЛЕНИИ НЕТ
      }

      if ($departure_station->zone->number != $arrival_station->zone->number)//Зоны разные
      {
        $price = Zone::whereBetween('number', [$departure_station->zone->number, $arrival_station->zone->number])->sum('price');
        if ($departure_station->zone->number > $arrival_station->zone->number)
        {
          $price = Zone::where('number', '<=', $departure_station->zone->number)->where('number', '>=', $arrival_station->zone->number)->sum('price');
        }
      }
      if (($departure_station->zone->number == 0 || $departure_station->zone->number == 1
      || $departure_station->zone->number == 2) && ($arrival_station->zone->number == 0
      || $arrival_station->zone->number == 1 || $arrival_station->zone->number == 2))//Москва
      {
        $price = $departure_station->zone->price;
      }

      if ($departure_station->zone->id == $arrival_station->zone->id)//Одна и та же зона
      {
        $price = $departure_station->zone->price;
      }
      if ($type_id->number == 1)//Тип билета
      {
        $price = $price * 1;
      }
      if ($type_id->number == 2)//Тип билета
      {
        $price = $price * 2;
      }
      $attributes = $request->only(['type_id', 'departure_station', 'arrival_station', 'start_date', 'end_date']);
      $attributes['price'] = $price;
      $attributes['user_id'] = $request->user()->id;
      $attributes['pay_status'] = 0;
      $ticket = Ticket::create($attributes);
      if ($request->wantsJson())
      {
        return $ticket->toJson(JSON_UNESCAPED_UNICODE);
      }
      else
      {
        return redirect(route('tickets.show', ['id' => $ticket->id]));
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prepareviewmobile(Request $request, Ticket $ticket)
    {
      $this->authorize('create', $ticket);//ПРОВЕРКА РОЛИ ПОЛЬЗОВАТЕЛЯ
      $ticket = new Ticket();
      $price = 0;
      $preinf = $request->only(['departure_station', 'arrival_station', 'type_id']);
      $departure_station = Station::findOrFail($preinf['departure_station']);
      $arrival_station = Station::findOrFail($preinf['arrival_station']);
      $type_id = Type::findOrFail($preinf['type_id']);
      $preinf['user_id'] = $request->user()->id;
      $user_id = User::findOrFail($preinf['user_id']);

      if ($departure_station->zone->number != $arrival_station->zone->number)//Зоны разные
      {
        $price = Zone::whereBetween('number', [$departure_station->zone->number, $arrival_station->zone->number])->sum('price');
        if ($departure_station->zone->number > $arrival_station->zone->number)
        {
          $price = Zone::where('number', '<=', $departure_station->zone->number)->where('number', '>=', $arrival_station->zone->number)->sum('price');
        }
      }
      if (($departure_station->zone->number == 0 || $departure_station->zone->number == 1
      || $departure_station->zone->number == 2) && ($arrival_station->zone->number == 0
      || $arrival_station->zone->number == 1 || $arrival_station->zone->number == 2))//Москва
      {
        $price = $departure_station->zone->price;
      }

      if ($departure_station->zone->id == $arrival_station->zone->id)//Одна и та же зона
      {
        $price = $departure_station->zone->price;
      }
      if ($type_id->number == 1)//Тип билета
      {
        $price = $price * 1;
      }
      if ($type_id->number == 2)//Тип билета
      {
        $price = $price * 2;
      }
      $attributes = $request->only(['type_id', 'departure_station', 'arrival_station', 'start_date', 'end_date']);
      $attributes['price'] = $price;
      $attributes['user_id'] = $request->user()->id;
      $attributes['pay_status'] = 0;
      $ticket = Ticket::create($attributes);
      return json_encode($ticket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest2 $request)
    {
      $attributes = $request->only(['id']);
      $ticket = Ticket::findOrFail($attributes['id']);
      $ticket->pay_status = 5647;
      //$array = array($dep, $arr, $t, $id, $price, $user, $start, $end, $stat);
      $ticket->update();
      return redirect(route('tickets.showfinal', ['id' => $ticket->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
      return view('tickets.prepareview', [
        'ticket' => $ticket
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function showfinal(Ticket $ticket)
    {
      $this->authorize('view', $ticket);
      $dep = $ticket->departure_station;
      $arr = $ticket->arrival_station;
      $t = $ticket->type_id;
      $id = $ticket->id;
      $price = $ticket->price;
      $user = $ticket->user_id;
      $start = $ticket->start_date;
      $end = $ticket->end_date;
      $stat = $ticket->pay_status;
      $str = "id=$id&dep=$dep&arr=$arr&type=$t&pr=$price&user=$user&start=$start&end=$end&st=$stat";
      $qr = QrCode::format('png')->size(2000)->generate($str);
      if ($request->header('Accept') === 'image/png') {
          return response($qr)
              ->header('Content-Type', 'image/png')
              ->header('Content-Disposition', 'attachment; filename="ticket.png"')
              ;
      }
      $qr = base64_encode($qr);
      return view('tickets.show', [
        'ticket' => $ticket,
        'qr' => $qr,
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function mobileticket(Ticket $ticket, Request $request)
    {
      $ticketinfo = Ticket::where('tickets.id', '=', $request->only(['id']));
      return $ticketinfo
      ->leftJoin('stations AS d', 'tickets.departure_station', '=', 'd.id')
      ->leftJoin('stations AS a', 'tickets.arrival_station',  '=', 'a.id')
      ->leftJoin('types AS t', 'tickets.type_id', '=', 't.id')
      ->leftJoin('users AS u', 'tickets.user_id', '=', 'u.id')
      ->get([
        'd.name AS departure_station_name',
        'a.name AS arrival_station_name',
        't.name AS type_name',
        'u.name AS user_name',
        'tickets.*'
      ])
      ->toJson(JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function mobileticketqrcode(Ticket $ticket, Request $request)
    {
      $dep = Ticket::where('id', '=', $request->only(['id']))->value('departure_station');
      $arr = Ticket::where('id', '=', $request->only(['id']))->value('arrival_station');
      $t = Ticket::where('id', '=', $request->only(['id']))->value('type_id');
      $id = Ticket::where('id', '=', $request->only(['id']))->value('id');
      $price = Ticket::where('id', '=', $request->only(['id']))->value('price');
      $user = Ticket::where('id', '=', $request->only(['id']))->value('user_id');
      $start = Ticket::where('id', '=', $request->only(['id']))->value('start_date');
      $end = Ticket::where('id', '=', $request->only(['id']))->value('end_date');
      $stat = Ticket::where('id', '=', $request->only(['id']))->value('pay_status');
      $str = "id=$id&dep=$dep&arr=$arr&type=$t&pr=$price&user=$user&start=$start&end=$end&st=$stat";
      $qr = QrCode::format('png')->size(2000)->generate($str);
      return response($qr)->header('Content-Type', 'image/png')
      /**->header('Content-Disposition', 'attachment; filename="ticket.png"')*/;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function remove(Ticket $ticket)
    {
        return view('tickets.remove')->withTicket($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function sortforuserswithprice(Request $request, Station $station)
    {
      $this->authorize('forceDelete', $station);
      $attributes = $request->only(['price']);
      $tickets = Ticket::where('price', '=', $attributes['price'])->where('pay_status', '=', 5647)->where('tickets.user_id', '=', $request->user()->id)->get();
      return view('tickets.sortforuserswithprice')->withTickets($tickets);
      //var_dump($tickets);
    }
}
