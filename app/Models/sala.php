<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\reserva;

class sala extends Model
{
    use HasFactory;

    public function reservas()
    {
        //Esto metodo es el que nos hace la referencia de que una categoria puede tener muchos todos (1 --> muchos)
        return $this->hasMany(reserva::class);
    }
}
