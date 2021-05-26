<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $descripcion
 * @property $costo
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleVentaServicio[] $detalleVentaServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'costo' => 'required',
		'foto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','costo','foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaServicios()
    {
        return $this->hasMany('App\Models\DetalleVentaServicio', 'id_servicio', 'id');
    }
    

}
