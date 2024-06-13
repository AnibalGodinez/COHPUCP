<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(4);
        return view('roles-permisos.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('roles-permisos.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name']
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('permission')->with('status', 'El permiso se ha creado exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('roles-permisos.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name,' . $permission->id]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permission')->with('status', 'El permiso se ha actualizado exitosamente');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission -> delete();
        return redirect('permission')->with('status', 'El permiso se ha eliminado');
    }
}
