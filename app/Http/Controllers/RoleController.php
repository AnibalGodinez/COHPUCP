<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\facades\DB;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $roles = Role::where(function($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('name', 'LIKE', "%{$search}%");
                    //   ->orWhere('description', 'LIKE', "%{$search}%");
                // Añadir más orWhere según las columnas que se necesiten buscar
            })->paginate(8);
            
        } else {
            $roles = Role::paginate(8);
        }

        return view('mantenimiento.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('mantenimiento.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name']
        ], [
            'name.unique' => 'Este Rol ya existe'
        ]);

        try {
            Role::create([
                'name' => $request->name
            ]);

            return redirect('roles')->with('status', 'El rol se ha creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }


    public function edit(Role $role)
    {
        return view('mantenimiento.role.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required', 
                'string', 
                'unique:roles,name,' . $role->id
                ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('roles')->with('status', 'El rol se ha actualizado exitosamente');
    }

    public function destroy($roleId)
    {
        $roles = Role::find($roleId);
        $roles -> delete();
        return redirect('roles')->with('status', 'El rol se ha eliminado');
    }

    public function AddPermissionRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                ->all();

        return view('mantenimiento.role.agregar-permisos', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required|array'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status', 'Permiso(s) asignado(s) al Rol');
    }
}
