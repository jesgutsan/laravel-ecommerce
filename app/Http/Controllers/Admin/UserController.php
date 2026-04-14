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
        'address'   => 'required',
        ], [

        'name.required' => 'El nom és obligatori',
        'last_name.required' => 'Els cognoms són obligatoris',
        'email.required' => 'El correu és obligatori',
        'email.email' => 'Format de correu incorrecte',
        'user.required' => "L'usuari és obligatori",
        'user.unique' => "Aquest usuari ja existeix",
        'email.unique' => "Aquest correu ja està registrat",
        ]);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->user = $request->user;
        $user->type = $request->type;
        $user->address = $request->address;


        /// Només si s'ha escrit una nova contrasenya
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
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
