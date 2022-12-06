<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

   
    public function create()
    {
        /* Para poder signar los permisos los llamamos */

        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create($request->all()); //Crear nuevo rol
        
        $role->permissions()->sync($request->permissions);//Asignamos distintos permisos al rol que acabamos de crear

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se creo con Exito');
    }

    
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

   
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);//Asignamos distintos permisos al rol que acabamos de crear

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se actualizo con Exito');

    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info', 'El rol se elimino con Exito');
    }
}
