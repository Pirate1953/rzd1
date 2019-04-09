<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usercard extends Model
{
    protected $fillable = ['user_id', 'paymethod_id', 'number'];

    public function paymethod()
    {
      return $this->belongsTo('App\Paymethod');
    }
}
