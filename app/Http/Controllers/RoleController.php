<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(8);
        return view('roles-permisos.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('roles-permisos.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required', 
                'string', 
                'unique:roles,name']
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('roles')->with('status', 'El rol se ha creado exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('roles-permisos.role.edit', ['role' => $role]);
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

        return view('roles-permisos.role.agregar-permisos', [
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
