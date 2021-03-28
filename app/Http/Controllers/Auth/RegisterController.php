<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'identificacion' => ['required', 'string', 'max:11', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telefono' => ['required', 'string', 'min:10','max:10'],
            'password' => $this->passwordRules(),
            'fecha_nacimiento' => ['required'],
            'pais' => ['required'],
            'estado' => ['required'],
            'ciudad' => ['required'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $input)
    {
        return User::create([
            'identificacion' => $input['identificacion'],
            'name' => $input['name'],
            'email' => $input['email'],
            'telefono' => $input['telefono'],
            'password' => Hash::make($input['password']),
            'fecha_nacimiento' => $input['fecha_nacimiento'],
            'pais' => $input['pais'],
            'estado' => $input['estado'],
            'ciudad' => $input['ciudad'],
        ]);
    }
}
