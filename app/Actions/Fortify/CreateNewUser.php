<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use HasRoles;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        
        Validator::make($input, [
            'identificacion' => ['required', 'string', 'max:11', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telefono' => ['required', 'string', 'min:10','max:10'],
            'password' => $this->passwordRules(),
            'fecha_nacimiento' => ['required', 'date', 'before:-18 years'],
            'pais' => ['required'],
            'estado' => ['required'],
            'ciudad' => ['required'],
        ])->validate();

        $user = User::create([
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

        $user->assignRole('Client');
        return $user;
    }
}
