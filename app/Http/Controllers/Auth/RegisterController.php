<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/';

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
            'name'      => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'user'      => ['required', 'string', 'max:255', 'unique:users'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address'   => ['required', 'string'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'El nom és obligatori.',
            'last_name.required' => 'El cognom és obligatori.',
            'user.required' => 'El nom d\'usuari és obligatori.',
            'user.unique' => 'Aquest nom d\'usuari ja està en ús.',
            'email.required' => 'El correu electrònic és obligatori.',
            'email.email' => 'Format de correu incorrecte.',
            'email.unique' => 'Aquest correu ja està registrat.',
            'address.required' => 'La direcció es obligatoria.',
            'password.required' => 'La contrasenya es obligatoria.',
            'password.min' => 'La contrasenya ha de tenir almenys 8 caràcters.',
            'password.confirmed' => 'Les contrasenyes no coincideixen.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'user' => $data['user'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'user',
            'active' => 1,
            'address'   => $data['address'],
        ]);
    }
}
