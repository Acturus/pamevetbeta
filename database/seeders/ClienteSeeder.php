<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create(
            [
                'documento_de_identidad'=> '87654321',
                'nombres'=>'Alejandro',
                'apellidos'=> 'Toledo',
                'correo'=> 'alvtoledo@example.com',
                'celular'=>'987654321',
                'direccion'=>'Av. Ejemplo 123 Siberia'
            ]
        );

        Cliente::create(
            [
                'documento_de_identidad'=> '81234567',
                'nombres'=>'Bozz',
                'apellidos'=> 'Layir',
                'correo'=> 'infitoymasaca@example.com',
                'celular'=>'912345678',
                'direccion'=>'Av. ToyStroli 123 Pixar'
            ]
        );
    }
}
