<?php

namespace App\Http\Controllers;

use App\Models\DashboardContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DashboardContentController extends Controller
{
    // Mostrar una lista de todos los contenidos del dashboard
    public function index()
{
    $dashboardContents = DashboardContent::all();
    return view('dashboard-content.index', compact('dashboardContents'));
}


    // Mostrar el formulario para crear un nuevo contenido del dashboard
    public function create()
    {
        return view('dashboard-content.create');
    }

    // Almacenar un nuevo contenido del dashboard
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'layout' => 'required|string|in:Por defecto,Imagen',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'pdf' => 'nullable|file',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:2048',
            'videos' => 'nullable|file|mimes:mp4,mov,avi,wmv,3gp,flv|max:10240',

            'links' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Manejar la imagen si se ha subido
        if ($request->hasFile('images')) {
            $validatedData['images'] = $request->file('images')->store('dashboard_images', 'public');
        }

        // Manejar el video si se ha subido
        if ($request->hasFile('videos')) {
            $validatedData['videos'] = $request->file('videos')->store('dashboard_videos', 'public');
        }

        DashboardContent::create($validatedData);

        return Redirect::route('dashboard-content.index')->with('success', 'Contenido del dashboard creado exitosamente.');
    }

    // Mostrar el formulario para editar un contenido del dashboard
    public function edit(DashboardContent $dashboardContent)
    {
        return view('dashboard-content.edit', compact('dashboardContent'));
    }

    // Actualizar un contenido del dashboard existente
    public function update(Request $request, DashboardContent $dashboardContent)
    {
        $validatedData = $request->validate([
            'layout' => 'required|string|in:Por defecto,Imagen',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'pdf' => 'nullable|file',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:2048',
            'videos' => 'nullable|file|mimes:mp4,mov,avi,wmv,flv|max:10240',

            'links' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Manejar la imagen si se ha subido una nueva
        if ($request->hasFile('images')) {
            // Borrar la imagen anterior si existe
            if ($dashboardContent->images) {
                Storage::disk('public')->delete($dashboardContent->images);
            }
            $validatedData['images'] = $request->file('images')->store('dashboard_images', 'public');
        }

        // Manejar el video si se ha subido uno nuevo
        if ($request->hasFile('videos')) {
            // Borrar el video anterior si existe
            if ($dashboardContent->videos) {
                Storage::disk('public')->delete($dashboardContent->videos);
            }
            $validatedData['videos'] = $request->file('videos')->store('dashboard_videos', 'public');
        }

        $dashboardContent->update($validatedData);

        return Redirect::route('dashboard-content.index')->with('success', 'Contenido del dashboard actualizado exitosamente.');
    }

    // Eliminar un contenido del dashboard
    public function destroy(DashboardContent $dashboardContent)
    {
        // Borrar la imagen si existe
        if ($dashboardContent->images) {
            Storage::disk('public')->delete($dashboardContent->images);
        }

        // Borrar el video si existe
        if ($dashboardContent->videos) {
            Storage::disk('public')->delete($dashboardContent->videos);
        }

        $dashboardContent->delete();

        return Redirect::route('dashboard-content.index')->with('success', 'Contenido del dashboard eliminado exitosamente.');
    }
}
