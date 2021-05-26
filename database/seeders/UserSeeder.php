<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombres'=> 'Cristhian Arturo',
            'apellidos'=> 'Tacuri Rosales',
            'email'=> 'i201810335@cibertec.edu.pe',
            'password'=> Hash::make('cibertec2021')
        ]);
    }
}
