<?php

namespace App\Casts;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MyDateTime implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        $fecha = Carbon::parse($value);

        return $fecha->format('d/m/Y h:i a');
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }

}
