<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria',
        'nombre_plato',
        'descripcion',
        'imagen',
        'precio',
        'cantidadDisponible',
    ];
}
