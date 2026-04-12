<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'extract',
        'image',
        'visible',
        'price',
        'category_id'
    ];

    public $timestamps = true;

    public function category(){
    // Un producte perteneix a una categoria
        return $this->belongsTo(Category::class);
    }
}

