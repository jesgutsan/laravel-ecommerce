<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    // Mostra el formulari de edició
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
        'name'      => 'required|max:100',
        'last_name' => 'required|max:100',
        'email'     => 'required|email|unique:users,email,' . $user->id,
        'user'      => 'required|unique:users,user,' . $user->id,
        'type'      => 'required|in:user,admin',
        ]);

        $user->fill($request->all());

        // Si se introduce una contraseña nueva, la encriptamos
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $updated = $user->save();

        $message = $updated ? 'Usuari actualitzat!' : 'Error al actualitzar';
        return redirect()->route('user.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('message', 'Usuari eliminat');
    }
}
