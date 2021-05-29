<?php

namespace App\Casts;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BirthCast implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        $hoy = Carbon::now();
        $naci = Carbon::parse($value);

        return $hoy->diffForHumans($naci);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }

}
