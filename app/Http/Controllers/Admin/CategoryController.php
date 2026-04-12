<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperem totes les categories de la BBDD
        $categories = Category::all();
        // Crida a la vista de l'administrador
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida les dades
        $request->validate([
        'name' => 'required|unique:categories|max:255',
        'description' => 'required',
        'color' => 'required'
        ],
        [ 'description.required' => 'Has d’introduir una descripció per a la categoria.'

    ]);

        // Crea el registre
        $category = Category::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'color' => $request->get('color'),
        ]);

        // Prepara el missatge i redirecciona
        $message = $category
            ? 'Categoria creada correctament!'
            : 'La Categoria NO s`ha pogut afegir!';

        return redirect()->route('category.index')->with('message', $message);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'color' => 'required',
        ]);

        $category->fill($request->all());
        $category->slug = Str::slug($request->get('name'));

        $updated = $category->save();

        $message = $updated
            ? 'Categoria actualitzada correctament!'
            : 'Error al actualitzar';

            return redirect()
                ->route('category.index')
                ->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $deleted = $category->delete();

        $message = $deleted
            ? 'Categoria eliminada correctament!'
            : 'Error al eliminar';

        return redirect()
            ->route('category.index')
            ->with('message', $message);
    }
}
