<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recuperem les categories per al desplegable del formulari
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|unique:products|max:255',
        'extract'     => 'required',
        'description' => 'required',
        'price'       => 'required',
        'category_id' => 'required',
    ]);

    $product = Product::create([
        'name'        => $request->get('name'),
        'slug'        => Str::slug($request->get('name')),
        'description' => $request->get('description'),
        'extract'     => $request->get('extract'),
        'price'       => $request->get('price'),
        'image'       => $request->get('image'),
        'visible'     => $request->has('visible') ? 1 : 0,
        'category_id' => $request->get('category_id'),
    ]);

    $message = $product
        ? 'Producte afegit correctament!'
        : 'Error al afegir el producte';

    return redirect()
        ->route('product.index')
        ->with('message', $message);
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = \App\Models\Category::orderBy('id', 'desc')
            ->pluck('name', 'id');

        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'extract'     => 'required',
            'description' => 'required',
            'price'       => 'required',
            'category_id' => 'required',
        ]);

        $product->fill($request->all());
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;

        $updated = $product->save();

        $message = $updated
            ? 'Producte actualitzat correctament!'
            : 'Error al actualitzar';

        return redirect()
            ->route('product.index')
            ->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();

        $message = $deleted
            ? 'Producte eliminat correctament!'
            : 'Error al eliminar';

        return redirect()
            ->route('product.index')
            ->with('message', $message);
    }
}
