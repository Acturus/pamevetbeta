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
      'nombres' => 'required|string|min:4|max:100',
      'apellidos' => 'required|string|min:4|max:100',
      'email' => 'required|string|min:13|max:100|unique:users,email',
      'id_rol' => 'required|numeric|min:1',
      'password'=> 'required|min:8'
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
