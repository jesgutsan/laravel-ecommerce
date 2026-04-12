<?php

namespace Database\Seeders;
use App\Models\User; // Importem el model d'usuari (Laravel 12)
use Illuminate\Support\Facades\Hash; // Necessari per a encriptar la contrasenya

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Sergi',
                'last_name' => 'Moreno',
                'email' => 'sergi@example.com',
                'user' => 'smoreno',
                'password' => Hash::make('123456'), // Encriptem la contrasenya per seguretat
                'type' => 'user',
                'active' => 1,
                'address' => 'Av. Font menor, Simat de la Valldigna',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ],
            [
                'name' => 'Jesus',
                'last_name' => 'Gutierrez',
                'email' => 'chusgutierrez80@gmail.com',
                'user' => 'jesgut',
                'password' => Hash::make('123456'),
                'type' => 'admin',
                'active' => 1,
                'address' => 'Carrer dr. Fleming 8, Sueca',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ],
        ];

        // Inserim les dades en la taula d'usuaris
        User::insert($data);
    }
}

