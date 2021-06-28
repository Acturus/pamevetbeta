<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consulta
 *
 * @property $id
 * @property $id_servicio
 * @property $id_mascota
 * @property $id_usuario
 * @property $detalle
 * @property $inicio
 * @property $fin
 *
 * @property Mascota $mascota
 * @property Servicio $servicio
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consulta extends Model
{

    static $rules = [
		'id_servicio' => 'required|numeric|min:1',
		'id_mascota' => 'required|numeric|min:1',
		'id_usuario' => 'required|numeric|min:1',
        'id_cliente' => 'required|numeric|min:1',
        'detalle' => 'nullable|string|min:10|max:3000',
        'inicio' => 'required|date_format:d/m/Y h:i a|after:yesterday'
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = ['inicio' => \App\Casts\MyDateTime::class, 'fin' => \App\Casts\MyDateTime::class];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_servicio','id_mascota','id_usuario','id_cliente','detalle','inicio','fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mascota()
    {
        return $this->belongsTo('App\Models\Mascota', 'id_mascota', 'id');
    }

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
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio', 'id_servicio', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }


}
