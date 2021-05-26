<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EspecieMascota
 *
 * @property $id
 * @property $nombre
 * @property $tipo
 * @property $nombre_cientifico
 * @property $peligro_extincion
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascota[] $mascotas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EspecieMascota extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'tipo' => 'required',
		'nombre_cientifico' => 'required',
		'peligro_extincion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','tipo','nombre_cientifico','peligro_extincion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mascotas()
    {
        return $this->hasMany('App\Models\Mascota', 'id_especie', 'id');
    }
    

}
