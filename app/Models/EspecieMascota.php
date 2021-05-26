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
		'nombre' => 'required|string|min:4|max:100|unique:especie_mascotas,nombre',
		'tipo' => 'required|string|min:3|max:100',
		'nombre_cientifico' => 'required|string|min:5|max:100',
		'peligro_extincion' => 'required|digits:1',
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
