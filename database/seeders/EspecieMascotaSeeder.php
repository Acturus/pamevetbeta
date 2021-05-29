<?php

namespace Database\Seeders;

use App\Models\EspecieMascota;
use Illuminate\Database\Seeder;

class EspecieMascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EspecieMascota::create(['nombre'=>'perro','tipo'=>'mamífero','nombre_cientifico'=>'Canis familiaris']);
        EspecieMascota::create(['nombre'=>'gato','tipo'=>'mamífero','nombre_cientifico'=>'Felis catus']);
    }
}
