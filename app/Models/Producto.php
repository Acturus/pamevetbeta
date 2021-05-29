<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $marca
 * @property $unidad_medida
 * @property $descripcion
 * @property $fotos
 * @property $cantidad
 * @property $costo_unidad
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleVentaProducto[] $detalleVentaProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
        'nombre' => 'required|string|min:3|max:100',
        'id_proveedor' => 'required|numeric|min:1',
        'unidad_medida' => 'required|string|max:100',
        'descripcion' => 'required|string|max:300',
        'fotos' => 'required',
        'fotos.*' => 'image',
        'cantidad' => 'required|numeric|min:0',
        'costo_unidad' => 'required|numeric|min:0.1',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_proveedor','unidad_medida','descripcion','fotos','cantidad','costo_unidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentaProductos()
    {
        return $this->hasMany('App\Models\DetalleVentaProducto', 'id_producto', 'id');
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider', 'id_proveedor', 'id');
    }
    

}
