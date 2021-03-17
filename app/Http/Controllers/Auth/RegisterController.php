<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::RESTAURANT;

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
            'company_name' => ['required', 'string', 'max:50'],
            'owner_name' => ['required', 'string', 'max:50'],
            'owner_lastname' => ['string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'cap' => ['required', 'string', 'max:10'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:50'],
            'dob' => ['required', 'date'],
            'piva' => ['required', 'string', 'max:11'],
            'iban' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'company_name' => $data['company_name'],
            'owner_name' => $data['owner_name'],
            'owner_lastname' => $data['owner_lastname'],
            'city' => $data['city'],
            'cap' => $data['cap'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'piva' => $data['piva'],
            'iban' => $data['iban'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
