<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $permissions = Permission::where(function($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('name', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%"); // Añadido para buscar por descripción
                // Añadir más orWhere según las columnas que se necesiten buscar
            })->paginate(4);

        } else {
            $permissions = Permission::paginate(4);
        }

        return view('mantenimiento.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('mantenimiento.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name']
        ], [
            'name.unique' => 'Este Permiso ya existe'
        ]);

        try {
            Permission::create([
                'name' => $request->name,
                'description' => $request->description // Añadido para guardar la descripción
            ]);

            return redirect('permission')->with('status', 'El permiso se ha creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('mantenimiento.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name,' . $permission->id]
        ]);

        $permission->update([
            'name' => $request->name,
            'description' => $request->description // Añadido para actualizar la descripción
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
