<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
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
      'nombre' => 'required|string|min:3|max:100|unique:servicios,nombre',
      'descripcion' => 'required|string|max:300',
      'costo' => 'required|numeric|min:0.1',
      'foto' => 'required',
      'foto.*' => 'image',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','costo','foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaServicios()
    {
        return $this->hasMany('App\Models\DetalleVentaServicio', 'id_servicio', 'id');
    }
    

}
