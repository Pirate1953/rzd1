<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['number', 'name', 'description', 'zone_id', 'user_id'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function zone()
    {
      return $this->belongsTo('App\Zone');
    }
    public function images()
    {
      return $this->hasMany('App\Image');
    }
}
