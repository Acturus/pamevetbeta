<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StockProducto
 *
 * @property $id
 * @property $id_producto
 * @property $cantidad
 * @property $costo_unidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StockProducto extends Model
{
    
    static $rules = [
		'id_producto' => 'required',
		'cantidad' => 'required',
		'costo_unidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','cantidad','costo_unidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    

}
