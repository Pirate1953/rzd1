<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Station;
use App\Paystatus;

class Ticket extends Model
{
    protected $fillable = ['type_id', 'departure_station', 'arrival_station', 'price', 'user_id', 'start_date', 'end_date', 'pay_status'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function paystatus()
    {
      return Paystatus::findOrFail($this->pay_status);
      //return $this->belongsTo('App\Paystatus');
    }
    public function zone()
    {
      return $this->belongsTo('App\Zone');
    }
    public function type()
    {
      return $this->belongsTo('App\Type');
    }
    public function station()
    {
      return $this->belongsTo('App\Station');
    }
    public function departure_station1()
    {
      return Station::findOrFail($this->departure_station);
    }
    public function arrival_station1()
    {
      return Station::findOrFail($this->arrival_station);
    }
}
