<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct() /* Metodo constructor para proteger las rutas */
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
    }
   
    public function index()
    {
        return view('admin.users.index');
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {
        $roles = Role::all();/* Mandamos todos los roles */
        return view('admin.users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles); /*roles es la relacion / sync se encargara de Actualizar la tabla central */

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los Roles');
    }

    
    public function destroy(User $user)
    {
        //
    }
}
