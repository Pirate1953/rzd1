<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Station;
use App\Usercard;
use App\Paymethod;
use App\Zone;
use App\User;
use App\Role;
use App\Gender;
use App\Userstat;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Http\Requests\StorePassportRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PassRequest;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\RaspRequest;

class StationController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Station::class);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Station $station)
    {
      $this->authorize('view', $station);
      $stations = Station::orderBy('number', 'ASC')->paginate(6);
      return view('stations.index')->withStations($stations);
    }

    public function cancel(Request $request)
    {
      $user = User::find($request->user()->id);
      $role_id = $user['role_id'];
      if ($role_id == '5498')
      {
        return redirect(route('zones.index'));
      }
      else
      {
        return redirect(route('stations.indexforusers'));
      }
    }

    public function indexforusers(Station $station, Request $request)
    {
      $this->authorize('forceDelete', $station);
      $stations = Station::orderBy('number', 'ASC');
      if ($request->wantsJson())
      {
        return $stations->get()->toJson(JSON_UNESCAPED_UNICODE);
      }
      else
      {
        return view('stations.indexforusers')->withStations($stations->paginate(6));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorizeResource(Station::class);
      $station = new Station();
      $zones = Zone::orderBy('number')->pluck('name', 'id');
      return view('stations.create', compact('station', 'zones'));//ПЕРЕДАЁМ СРАЗУ НЕСКОЛЬКО ПЕРЕМЕННЫХ
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationRequest $request)
    {
      $attributes = $request->only(['number', 'name', 'description', 'zone_id']);
      $attributes['user_id'] = $request->user()->id;
      $station = Station::create($attributes);
      $request->session()->flash(
          'message',
          __('Added station', ['name' => $station->name])
      );
      return redirect(route('stations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station, Image $image)
    {
      $this->authorize('view', $station);
      return view('stations.show')->withStation($station);
    }

    public function showforusers(Station $station, Image $image)
    {
      return view('stations.showforusers')->withStation($station);
    }

    public function showforanonym(Station $station, Image $image)
    {
      return view('stations.showforanonym')->withStation($station);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
      $zones = Zone::orderBy('number')->pluck('name', 'id');
      return view('stations.edit', compact('station', 'zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(StationRequest $request, Station $station)
    {
      $attributes = $request->only(['number', 'name', 'description', 'zone_id']);
      $station->update($attributes);
      $request->session()->flash(
          'message',
          __('Updated station', ['name' => $station->name])
      );
      return redirect(route('stations.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function remove(Station $station)
    {
        $this->authorize('delete', $station);
        return view('stations.remove')->withStation($station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station, Request $request)
    {
      foreach ($station->images as $image ) {
        unlink(storage_path("app/$image->filename"));
      }
      $station->delete();
      $request->session()->flash(
          'message',
          __('Removed station', ['name' => $station->name])
      );
      return redirect(route('stations.index'));
    }

    public function sort(Request $request, Station $station)
    {
      $this->authorize('search', Station::class);
      $attributes = $request->only(['name']);
      $stations = Station::where('name', '=', $attributes['name'])->get();
      return view('stations.indexsort')->withStations($stations);
    }

    public function sortforusers(Request $request, Station $station)
    {
      $this->authorize('forceDelete', $station);
      $attributes = $request->only(['name']);
      $stations = Station::where('name', '=', $attributes['name'])->get();
      return view('stations.indexsortforusers')->withStations($stations);
    }

    public function sortforanonym(Request $request, Station $station)
    {
      //var_dump($request->only(['zone_id']));
      $zones = Zone::orderBy('number', 'ASC')->pluck('name', 'id');
      $attributes = $request->only(['zone_id']);
      $stations = Station::where('zone_id', '=', $attributes['zone_id'])->get();
      return view('stations.indexsortforanonym', compact('stations', 'zones'));
    }

    public function indexforanonym()
    {
      $zones = Zone::orderBy('number', 'ASC')->pluck('name', 'id');
      $stations = Station::orderBy('number', 'ASC')->paginate(6);
      return view('stations.indexforanonym', compact('zones', 'stations'));
    }

    public function aboutproject()
    {
      return view('stations.aboutproject');
    }

    public function stages()
    {
      return view('stations.stages');
    }

//======================================USERS==========================================
  public function updateuser(UserRequest $request)
  {
    $user = User::find($request->user()->id);
    $attributes = $request->only(['name', 'fam', 'patr']);
    $attributes['userstat_id'] = 1;
    $user->update($attributes);
    $request->session()->flash(
        'message',
        __('Updated user')
      );
      $role_id = $user['role_id'];
      if ($role_id == '5498')
      {
        return redirect(route('zones.index'));
      }
      else
      {
        return redirect(route('stations.indexforusers'));
      }
    }

    public function editprofile(Request $request)
    {
      $user = User::find($request->user()->id);
      return view('auth.editprofile')->withUser($user);
    }

    public function editprofileforadmin(Request $request)
    {
      $user = User::find($request->user()->id);
      return view('auth.editprofileforadmin')->withUser($user);
    }

    public function editpass(Request $request)
    {
      $user = User::find($request->user()->id);
      return view('auth.editpassword')->withUser($user);
    }

    public function editpassforadmin(Request $request)
    {
      $user = User::find($request->user()->id);
      return view('auth.editpasswordforadmin')->withUser($user);
    }

    public function updatepass(PassRequest $request)
    {
      $user = User::find($request->user()->id);
      $attributes = $request->only(['password_confirmation']);
      $att['password'] = Hash::make($attributes['password_confirmation']);
      $user->update($att);
      $request->session()->flash(
          'message',
          __('Updated password')
      );
      $role_id = $user['role_id'];
      if ($role_id == '5498')
      {
        return redirect(route('zones.index'));
      }
      else
      {
        return redirect(route('stations.indexforusers'));
      }
    }

    public function usersindex(User $user, Station $station)
    {
      $this->authorize('view', $station);
      $users = User::where('userstat_id', '=', '1')->orderBy('id', 'ASC')->paginate(6);
      return view('users.index')->withUsers($users);
    }

    public function usersindexact(User $user, Station $station)
    {
      $this->authorize('view', $station);
      $users = User::where('userstat_id', '=', '2')->orderBy('id', 'ASC')->paginate(6);
      return view('users.indexact')->withUsers($users);
    }

    public function editrole(User $user, Station $station)
    {
      $this->authorize('view', $station);
      $role = Role::orderBy('id')->pluck('name', 'id');
      $userstat = Userstat::orderBy('id')->pluck('name', 'id');
      return view('auth.editrole', compact('user', 'role', 'userstat'));//ПЕРЕДАЁМ СРАЗУ НЕСКОЛЬКО ПЕРЕМЕННЫХ
    }

    public function updaterole(Request $request, User $user)
    {
      $attributes = $request->only(['name', 'fam', 'patr', 'role_id', 'userstat_id']);
      //var_dump($attributes);
      $user->update($attributes);
      $request->session()->flash(
          'message',
          __('Updated user and role')
      );
      return redirect(route('users.usersindex'));
    }

    public function deleteuser(Request $request, User $user)
    {
      $user->delete();
      $request->session()->flash(
          'message',
          __('Removed user')
      );
      return redirect(route('users.usersindex'));
    }

    public function deletecurrentuser(Request $request)
    {
      $currentuser = User::find($request->user()->id);
      $currentuser->delete();
      return redirect(route('login'));
    }

    public function editstat(Request $request)
    {
      $this->authorize('storepassport', Station::class);
      $user = new User();
      $gender = Gender::orderBy('id')->pluck('name', 'id');
      return view('auth.editstat', compact('user', 'gender'));//ПЕРЕДАЁМ СРАЗУ НЕСКОЛЬКО ПЕРЕМЕННЫХ
    }

    public function updatestat(StorePassportRequest $request, User $user)
    {
      $user = User::find($request->user()->id);
      $attributes = $request->only(['issuedby', 'unitcode', 'passser', 'passnumber']);
      $attributes1 = $request->only(['city', 'datebirth', 'issuedate', 'gender_id']);
      $attributes1['userstat_id'] = 1;
      $user->update($attributes);
      $user->update($attributes1);
      $request->session()->flash(
          'message',
          __('We got your Passport data')
      );
      //var_dump($attributes1);
      return redirect(route('stations.indexforusers'));
    }

    public function redir()
    {
      if (isset(Auth::user()->role_id))
      {
        $role_id = Auth::user()->role_id;
        if ($role_id == '5498')
        {
          return redirect(route('zones.index'));
        }
        if ($role_id == '6778')
        {
          return redirect(route('stations.indexforusers'));
        }
      }
      else
      {
        return redirect(route('login'));
      }
    }
//===============================CARDS============================================
    public function createcard(Request $request)
    {
      $this->authorize('cards', Station::class);
      $usercard = new Usercard();
      $paymethods = Paymethod::orderBy('id', 'ASC')->pluck('name', 'id');
      return view('users.addcard', compact('usercard', 'paymethods'));//ПЕРЕДАЁМ СРАЗУ НЕСКОЛЬКО ПЕРЕМЕННЫХ
    }

    public function storecard(StoreCardRequest $request)
    {
      $attributes = $request->only(['paymethod_id', 'number']);
      $attributes['user_id'] = $request->user()->id;
      $usercard = Usercard::create($attributes);
      $request->session()->flash(
          'message',
          __('Added card')
      );
      return redirect(route('stations.indexforusers'));
    }

    public function indexcard(Request $request, Usercard $cards)
    {
      $this->authorize('cards', Station::class);
      $userid = $request->user()->id;
      $cards = Usercard::where('user_id', '=', $userid)->orderBy('id', 'ASC')->paginate(6);
      return view('users.indexcard')->withCards($cards);
    }

    public function removecard(Usercard $card)
    {
      $this->authorize('cards', Station::class);
      return view('users.removecard')->withCard($card);
    }

    public function destroycard(Usercard $card, Request $request)
    {
      $this->authorize('cards', Station::class);
      $card->delete();
      $request->session()->flash(
          'message',
          __('Removed card')
      );
      return redirect(route('cards.indexcard'));
    }
//============================IMAGES============================================
    public function addimage(Request $request, Station $station)
    {
      $this->authorize('view', $station);
      return view('stations.addimage')->withStation($station);
    }

    public function storeimage(CreateImageRequest $request, Station $station)
    {
      $filename = $request->file('filename')->store('/stations');
      ////////var_dump($filename);
      $attributes = $request->only(['station_id']);
      $attributes['filename'] = $filename;
      ////////var_dump($path, $attributes);
      $Image = Image::create($attributes);
      return redirect(route('stations.index'));
      ////////var_dump($request->file('filename'));
    }
//======================================TOKENS==========================================
    public function tokenlist()
    {
      $tokens = DB::table('oauth_access_tokens')->get();
      var_dump($tokens);
    }

//============================RASP======================================================
    public function raspmain()
    {
      return view('rasps.raspmain');
    }

    public function raspmainuser()
    {
      return view('rasps.raspmainuser');
    }

    public function raspget(RaspRequest $request)
    {
      try
      {
        $client = new Client([
        'base_uri' => 'http://localhost:8080',
        ]);
        $attributes = $request->only(['departure_station', 'arrival_station', 'date']);
        $response = $client->request('GET', 'https://api.rasp.yandex.net/v3.0/search/', [
          'query' => [
            'apikey'          => '',
            'from'            => $attributes['departure_station'],
            'to'              => $attributes['arrival_station'],
            'date'            => $attributes['date'],
            'lang'            => 'ru_RU',
            'transport_types' => 'suburban',
          ]
        ]);
        $times = json_decode($response->getBody(), 1);
        $total = $times['pagination']['total'];
        $date = substr($times['segments'][0]['arrival'], 0, 10);
        return view('rasps.raspgot', compact('times', 'total', 'date'));
      }
      catch (\Exception $exception)
      {
        return view('tickets.noway');
      }
    }

    public function raspgetuser(RaspRequest $request)
    {
      try
      {
        $client = new Client([
        'base_uri' => 'http://localhost:8080',
        ]);
        $attributes = $request->only(['departure_station', 'arrival_station', 'date']);
        $response = $client->request('GET', 'https://api.rasp.yandex.net/v3.0/search/', [
          'query' => [
            'apikey'          => '',
            'from'            => $attributes['departure_station'],
            'to'              => $attributes['arrival_station'],
            'date'            => $attributes['date'],
            'lang'            => 'ru_RU',
            'transport_types' => 'suburban',
          ]
        ]);
        $times = json_decode($response->getBody(), 1);
        $total = $times['pagination']['total'];
        $date = substr($times['segments'][0]['arrival'], 0, 10);
        return view('rasps.raspgotuser', compact('times', 'total', 'date'));
      }
      catch (\Exception $exception)
      {
        return view('tickets.noway');
      }
    }
}
