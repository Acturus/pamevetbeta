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
        return $this->belongsTo('App\Models\Cliente', 'id_cliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function especieMascota()
    {
        return $this->belongsTo('App\Models\EspecieMascota', 'id_especie', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'id_mascota', 'id');
    }


}
