<?php

namespace App\Http\Controllers;

use App\Models\Product;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::where('visible', 1)->get();

        return view('store.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
                          ->where('visible', 1)
                          ->firstOrFail();

        return view('store.show', compact('product'));
    }
}


