<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $documento_de_identidad
 * @property $nombres
 * @property $apellidos
 * @property $correo
 * @property $celular
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascota[] $mascotas
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'documento_de_identidad' => 'required|numeric|digits_between:8,15|unique:clientes,documento_de_identidad',
		'nombres' => 'required|string|min:4|max:100',
		'apellidos' => 'required|string|min:4|max:100',
		'correo' => 'required|string|min:13|max:100|unique:clientes,correo',
        'celular'=> 'required|digits:9|unique:clientes,celular',
		'direccion' => 'required|string|min:20|max:200',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['documento_de_identidad','nombres','apellidos','correo','celular','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mascotas()
    {
        return $this->hasMany('App\Models\Mascota', 'id_cliente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'id_cliente', 'id');
    }
    

}
