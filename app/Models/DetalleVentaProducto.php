<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVentaProducto
 *
 * @property $id
 * @property $id_venta
 * @property $id_producto
 * @property $cantidad
 * @property $subtotal
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleVentaProducto extends Model
{
    
    static $rules = [
		'id_venta' => 'required',
		'id_producto' => 'required',
		'cantidad' => 'required',
		'subtotal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_venta','id_producto','cantidad','subtotal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->belongsTo('App\Models\Venta', 'id', 'id_venta');
    }
    

}
