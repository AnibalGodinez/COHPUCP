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

        $roles = Role::query();

        if ($search) {
            $roles = Role::where(function($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('name', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%");
            }); 
        } 
        $roles->orderBy('id', 'desc');
        $roles = $roles->paginate(4); 
        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name'],
            'description' => ['nullable', 'string'] // Validación para el campo description
        ], [
            'name.unique' => 'Este Rol ya existe'
        ]);

        try {
            Role::create([
                'name' => $request->name,
                'description' => $request->description // Almacenamiento del campo description
            ]);

            return redirect('roles')->with('status', 'El rol se ha creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }


    public function edit(Role $role)
    {
        return view('roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required', 
                'string', 
                'unique:roles,name,' . $role->id
            ],
            'description' => ['nullable', 'string'] // Validación para el campo description
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description // Actualización del campo description
        ]);

        return redirect('roles')->with('status', 'El rol se ha actualizado exitosamente');
    }

    public function destroy($roleId)
    {
        $roles = Role::find($roleId);
        $roles->delete();
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

        return view('roles.agregar-permisos', [
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

    public function verRoles(Request $request)
    {
        $search = $request->input('search');

        $roles = Role::query()
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                             ->orWhere('name', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('roles.view', compact('roles'));
    }
}
