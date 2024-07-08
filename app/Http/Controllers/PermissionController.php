<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver permisos', ['only' => ['verPermisos']]);
        $this->middleware('permission:indice permisos', ['only' => ['index']]);
        $this->middleware('permission:actualizar permiso', ['only' => ['update','edit']]);
        $this->middleware('permission:crear permiso', ['only' => ['create','store']]);
        $this->middleware('permission:borrar permiso', ['only' => ['destroy']]);
    }

//-----------------------------------------------------------------------------------------------------------------
    public function index(Request $request)
    {
        $search = $request->query('search');

        $permissions = Permission::query();

        if ($search) {
            $permissions = Permission::where(function($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('name', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        $permissions->orderBy('id', 'desc'); 
        $permissions = $permissions->paginate(8);
        return view('permissions.index', ['permissions' => $permissions]);
    }

//-----------------------------------------------------------------------------------------------------------------
    public function create()
    {
        return view('permissions.create');
    }

//-----------------------------------------------------------------------------------------------------------------
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

            return redirect('permission/create')->with('status', 'El permiso se ha creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }

//-----------------------------------------------------------------------------------------------------------------
    public function edit(Permission $permission)
    {
        return view('permissions.edit', ['permission' => $permission]);
    }

//-----------------------------------------------------------------------------------------------------------------
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

//-----------------------------------------------------------------------------------------------------------------
    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission -> delete();
        return redirect('permission')->with('status', 'El permiso se ha eliminado');
    }

//-----------------------------------------------------------------------------------------------------------------
    public function verPermisos(Request $request)
    {
        $search = $request->input('search');

        $permissions = Permission::query()
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                             ->orWhere('name', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('permissions.view', compact('permissions'));
    }

}
