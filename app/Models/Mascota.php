<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mascota
 *
 * @property $id
 * @property $id_cliente
 * @property $nombre
 * @property $sexo
 * @property $id_especie
 * @property $edad
 * @property $fotos
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property EspecieMascota $especieMascota
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mascota extends Model
{
    
    static $rules = [
		'id_cliente' => 'required|numeric|min:1',
		'nombre' => 'required|string|min:4|max:100',
		'sexo' => 'required|digits:1',
		'id_especie' => 'required|numeric|min:1',
        'fecha_nacimiento'=>'required|date|date_format:d/m/Y|before_or_equal:now',
        'fotos'=>'required',
        'fotos.*' => 'image',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','nombre','sexo','id_especie','fecha_nacimiento','fotos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'id_cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function especieMascota()
    {
        return $this->hasOne('App\Models\EspecieMascota', 'id', 'id_especie');
    }
    

}
