<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 *
 * @property $id
 * @property $nombre
 * @property $contacto
 * @property $correo
 * @property $numero
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provider extends Model
{
    
    static $rules = [
		'nombre' => 'required|string|min:4|max:100|unique:providers,nombre',
		'contacto' => 'required|string|min:4|max:100',
		'correo' => 'required|string|min:13|max:100|unique:providers,correo',
		'numero' => 'required|digits:9|unique:providers,numero',
		'direccion' => 'required|string|min:20|max:300',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','contacto','correo','numero','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id_proveedor', 'id');
    }
    

}
