<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['subtotal', 'shipping', 'user_id'];

    // Una comanda perteneix a un usuari (client)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un pedido tiene muchos detalles (productos) [7, 8]
    public function order_items()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }
}
