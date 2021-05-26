<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $password
 * @property $email
 * @property $estado
 * @property $id_rol
 * @property $foto_perfil
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $hidden = [
      'password',
      'remember_token',
    ];
    
    static $rules = [
		'nombres' => 'required',
		'apellidos' => 'required',
		'email' => 'required',
		'estado' => 'required',
		'id_rol' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $guarded = [];

    protected $casts = [
      'estado' => 'boolean'
    ];
}
