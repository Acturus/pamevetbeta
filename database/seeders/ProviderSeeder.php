<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create(
            [
                'nombre'=>'RINTISA',
                'contacto'=>'Bilbo Bolson',
                'correo'=>'consultas@rintisa.com',
                'numero'=>'918035123',
                'direccion'=>'Av. José Pardo 434, Miraflores'
            ]
        );

        Provider::create(
            [
                'nombre'=>'PURINA',
                'contacto'=>'Etel Pozo',
                'correo'=>'info@purina.com',
                'numero'=>'989223567',
                'direccion'=>'Ovalo Naranjal, Panamericana Norte, Los Olivos'
            ]
        );
    }
}
