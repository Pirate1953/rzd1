<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
}
