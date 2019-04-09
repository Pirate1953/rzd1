<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fam', 'patr', 'role_id', 'userstat_id', 'gender_id',
    'issuedby', 'unitcode', 'passser', 'passnumber', 'city', 'datebirth', 'issuedate', 'gender_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
      return $this->belongsTo('App\Role');
    }

    public function userstat()
    {
      return $this->belongsTo('App\Userstat');
    }

    public function gender()
    {
      return $this->belongsTo('App\Gender');
    }
}
