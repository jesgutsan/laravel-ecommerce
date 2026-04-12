<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    // Definir els camps que són assignables de manera massiva
    protected $fillable = [
        'price',
        'quantity',
        'product_id',
        'order_id',
    ];

    public $timestamps = false;

    public function product()
    {
        // Un ítem de la comanda perteneix a un producte 
        return $this->belongsTo(Product::class);
    }

}
