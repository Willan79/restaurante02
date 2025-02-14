<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'estado',
        'metodo_pago',
        'direccion_envio',
    ];

    public function user()
    {
        //belongsTo (Relación inversa de "uno a muchos")
        return $this->belongsTo(User::class);
    }

    // Relación con los detalles del pedido
    public function detalles()
    {
        // hasMany (Relación "uno a muchos")
        return $this->hasMany(DetallePedido::class);
    }
}
