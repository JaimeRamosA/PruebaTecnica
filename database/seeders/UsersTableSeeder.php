<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = User::create([
            'identificacion' => '0000000001',
            'name' => 'Admin',
            'telefono' => '3100000000',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('admin'),
            'fecha_nacimiento' => '1993-11-23',
            'pais' => 'Colombia',
            'estado' => 'Cordoba',
            'ciudad' => 'Monteria',
        ]);

        $admin->assignRole('Administrator');

        $client = User::create([
            'identificacion' => '0000000002',
            'name' => 'cliente',
            'telefono' => '310',
            'email' => 'client@gmail.com',
            'password' => Hash::make('client'),
            'fecha_nacimiento' => '1993-11-23',
            'pais' => 'Colombia',
            'estado' => 'Cordoba',
            'ciudad' => 'Monteria',
        ]);

        $client->assignRole('Client');

    }
}
