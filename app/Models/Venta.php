<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $id_cliente
 * @property $id_estado
 * @property $costo_total
 * @property $tipo_entrega
 * @property $fecha_entrega
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property EstadoVenta $estadoVenta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'id_cliente' => 'required',
		'id_estado' => 'required',
		'costo_total' => 'required',
		'tipo_entrega' => 'required',
		'fecha_entrega' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_estado','costo_total','tipo_entrega','fecha_entrega'];


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
    public function estadoVenta()
    {
        return $this->hasOne('App\Models\EstadoVenta', 'id', 'id_estado');
    }
    

}
