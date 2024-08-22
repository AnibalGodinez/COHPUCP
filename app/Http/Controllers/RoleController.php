<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ver roles', ['only' => ['verRoles']]);
        $this->middleware('permission:indice roles', ['only' => ['index']]);
        $this->middleware('permission:actualizar rol', ['only' => ['update','edit']]);
        $this->middleware('permission:crear rol', ['only' => ['create','store']]);
        $this->middleware('permission:eliminar rol', ['only' => ['destroy']]);
        $this->middleware('permission:agregar permisos al rol', ['only' => ['AddPermissionRole', 'givePermissionRole']]);
    }

//-----------------------------------------------------------------------------------------------------------------
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
        $roles = $roles->paginate(8); 
        return view('roles.index', ['roles' => $roles]);
    }
    
//-----------------------------------------------------------------------------------------------------------------
    public function create()
    {
        return view('roles.create');
    }

//-----------------------------------------------------------------------------------------------------------------
    public function store(Request $request)
    {
    $request->validate([
        'name' => ['required', 'string', 'unique:roles,name'],
        'description' => ['nullable', 'string', 'max:255']
    ], [
        'name.unique' => 'Este Rol ya existe.'
    ]);

    try {
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $this->addToRouteGroup($role); // Llamar función para agregar al grupo de rutas

        return redirect('roles')->with('status', '¡El rol se ha creado con éxito!.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
    }
    }

    protected function addToRouteGroup($role)
    {
    $roleName = strtolower($role->name);

    Route::group(['middleware' => ['auth', "role:$roleName"]], function () {
        // Aquí puedes definir las rutas específicas para este nuevo rol si lo deseas
    });
    
    }

//-----------------------------------------------------------------------------------------------------------------
    public function edit(Role $role)
    {
        return view('roles.edit', ['role' => $role]);
    }

//-----------------------------------------------------------------------------------------------------------------
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required', 
                'string', 
                'unique:roles,name,' . $role->id
            ],
            'description' => ['nullable', 'string', 'max:255'] // Validación para el campo description
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description // Actualización del campo description
        ]);

        return redirect('roles')->with('status', '¡El rol se ha actualizado con éxito!');
    }

//-----------------------------------------------------------------------------------------------------------------
    public function destroy($roleId)
    {
        $roles = Role::find($roleId);
        $roles->delete();
        return redirect('roles')->with('status', '¡El rol se ha eliminado con éxito!');
    }
    
//-----------------------------------------------------------------------------------------------------------------
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
 
//-----------------------------------------------------------------------------------------------------------------
    public function givePermissionRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required|array'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status', 'Permiso(s) asignado(s) al Rol');
    }
   
//-----------------------------------------------------------------------------------------------------------------
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
            ->paginate(8);

        return view('roles.view', compact('roles'));
    }
}
