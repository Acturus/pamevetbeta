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
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','id_cliente','id_estado','costo_total','tipo_entrega','fecha_entrega','motivo_anulacion','hora_entrega'];

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
    public function estadoVenta()
    {
        return $this->belongsTo('App\Models\EstadoVenta', 'id', 'id_estado');
    }

    public function detalleProducto(){
        return $this->hasMany('\App\Models\DetalleVentaProducto', 'id_venta', 'id');
    }
}
