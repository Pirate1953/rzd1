<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/stations/indexforusers';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:20|regex:/^[а-яё]+$/iu',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:10|confirmed|regex:/^[\da-z-!"№;%:?*().,+=_]+$/iu',
            'fam' => 'required|string|max:20|regex:/^[а-яё]+$/iu',
            'patr' => 'max:20|string|regex:/^[а-яё]+$/iu|nullable',
            'role_id' => 'required|numeric|max:9000',
            'userstat_id' => 'required|numeric|max:9000',
            'gender_id' => 'required|numeric|max:9000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role_id' => $data['role_id'],
            'userstat_id' => $data['userstat_id'],
            'gender_id' =>$data['gender_id'],
            'fam' => $data['fam'],
            'patr' => $data['patr'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
