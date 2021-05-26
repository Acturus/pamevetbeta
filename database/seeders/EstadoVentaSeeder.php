<?php

namespace Database\Seeders;

use App\Models\EstadoVenta;
use Illuminate\Database\Seeder;

class EstadoVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoVenta::create(
            ['nombre'=> 'Registrada'],
            ['nombre'=> 'Aprobada'],
            ['nombre'=> 'En preparación'],
            ['nombre'=> 'En camino'],
            ['nombre'=> 'Entregada'],
            ['nombre'=> 'Anulada']
        );
    }
}
