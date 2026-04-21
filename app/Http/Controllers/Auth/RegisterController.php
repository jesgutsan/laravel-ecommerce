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
            'name'      => ['required', 'min:2', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
            'last_name' => ['required', 'string', 'min:2', 'max:255',   'regex:/^[a-zA-ZÀ-ÿ\s]+$/u'],
            'user'      => ['required', 'string', 'min:4', 'max:255', 'alpha_num', 'unique:users'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address'   => ['required', 'string', 'min:5', 'regex:/^[a-zA-Z0-9À-ÿ\s,.-]+$/u'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'El nom és obligatori.',
            'name.min' => 'El nom ha de tindre almenys 2 caràcters.',
            'name.regex' => 'El nom només pot contindre lletres i espais.',

            'last_name.required' => 'El cognom és obligatori.',
            'last_name.min' => 'El cognom ha de tindre almenys 2 caràcters.',
            'last_name.regex' => 'El cognom només pot contindre lletres i espais.',

            'user.required' => 'El nom d\'usuari és obligatori.',
            'user.min' => 'El nom d\'usuari ha de tindre almenys 4 caràcters.',
            'user.alpha_num' => 'El nom d\'usuari només pot contindre lletres i números.',
            'user.unique' => 'Aquest nom d\'usuari ja està en ús.',

            'email.required' => 'El correu electrònic és obligatori.',
            'email.email' => 'Format de correu incorrecte.',
            'email.unique' => 'Aquest correu ja està registrat.',

            'address.required' => 'La direcció és obligatòria.',
            'address.min' => 'La direcció ha de tindre almenys 5 caràcters.',
            'address.regex' => 'La direcció ha de contindre almenys una lletra.',

            'password.required' => 'La contrasenya és obligatòria.',
            'password.min' => 'La contrasenya ha de tindre almenys 8 caràcters.',
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
