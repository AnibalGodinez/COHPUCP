<?php

namespace App\Http\Controllers;

use App\Models\DashboardContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DashboardContentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:indice contenido dasboard', ['only' => ['index']]);
        $this->middleware('permission:actualizar contenido dasboard', ['only' => ['update', 'edit']]);
        $this->middleware('permission:crear contenido dasboard', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar contenido dasboard', ['only' => ['destroy']]);
    }

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
            'layout' => 'required|string|in:Por defecto,Archivos',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'pdf' => 'nullable|file|mimes:pdf|max:5120',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:2048',
            'videos' => 'nullable|mimes:mp4,mov,avi,ogg,qt,wmv,3gp,flv|max:20000',

            'links' => 'nullable|string|url',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
        ]);

        try {
            // Manejar el archivo PDF si se ha subido
            if ($request->hasFile('pdf')) {
                $validatedData['pdf'] = $request->file('pdf')->store('dashboard_pdfs', 'public');
            }

            // Manejar la imagen si se ha subido
            if ($request->hasFile('images')) {
                $validatedData['images'] = $request->file('images')->store('dashboard_images', 'public');
            }

            // Manejar el video si se ha subido
            if ($request->hasFile('videos')) {
                $validatedData['videos'] = $request->file('videos')->store('dashboard_videos', 'public');
            }

            // Crear el contenido del dashboard con todos los campos
            DashboardContent::create(array_merge(
                $validatedData,
                ['user_id' => auth()->id()]
            ));

            return redirect()->route('dashboard-content.index')->with('success', '¡Contenido del dashboard creado éxito!');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error al subir archivo: ' . $e->getMessage());

            return redirect()->back()->with('error', 'No se pudo subir el contenido.')->withInput();
        }
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
            'layout' => 'required|string|in:Por defecto,Archivos',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'pdf' => 'nullable|file|mimes:pdf|max:5120',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:2048',
            'videos' => 'nullable|mimes:mp4,mov,avi,ogg,qt,wmv,3gp,flv|max:20000',

            'links' => 'nullable|string|url',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',

            'remove_pdf' => 'nullable|boolean',
            'remove_images' => 'nullable|boolean',
            'remove_videos' => 'nullable|boolean',
        ]);

        try {
            // Manejar el PDF si se ha subido uno nuevo
            if ($request->hasFile('pdf')) {
                if ($dashboardContent->pdf) {
                    Storage::disk('public')->delete($dashboardContent->pdf);
                }
                $validatedData['pdf'] = $request->file('pdf')->store('dashboard_pdfs', 'public');
            } elseif ($request->input('remove_pdf')) {
                // Eliminar el PDF si el checkbox está marcado
                if ($dashboardContent->pdf) {
                    Storage::disk('public')->delete($dashboardContent->pdf);
                    $validatedData['pdf'] = null; // Eliminar el archivo actual del registro
                }
            }

            // Manejar la imagen si se ha subido una nueva
            if ($request->hasFile('images')) {
                if ($dashboardContent->images) {
                    Storage::disk('public')->delete($dashboardContent->images);
                }
                $validatedData['images'] = $request->file('images')->store('dashboard_images', 'public');
            } elseif ($request->input('remove_images')) {
                // Eliminar la imagen si el checkbox está marcado
                if ($dashboardContent->images) {
                    Storage::disk('public')->delete($dashboardContent->images);
                    $validatedData['images'] = null; // Eliminar el archivo actual del registro
                }
            }

            // Manejar el video si se ha subido uno nuevo
            if ($request->hasFile('videos')) {
                if ($dashboardContent->videos) {
                    Storage::disk('public')->delete($dashboardContent->videos);
                }
                $validatedData['videos'] = $request->file('videos')->store('dashboard_videos', 'public');
            } elseif ($request->input('remove_videos')) {
                // Eliminar el video si el checkbox está marcado
                if ($dashboardContent->videos) {
                    Storage::disk('public')->delete($dashboardContent->videos);
                    $validatedData['videos'] = null; // Eliminar el archivo actual del registro
                }
            }

            $dashboardContent->update($validatedData);

            return redirect()->route('dashboard-content.index')->with('success', '¡Contenido del dashboard actualizado con éxito!');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error al actualizar contenido: ' . $e->getMessage());

            return redirect()->back()->with('error', 'No se pudo actualizar el contenido.')->withInput();
        }
    }


    // Eliminar un contenido del dashboard
    public function destroy(DashboardContent $dashboardContent)
    {
        try {
            if ($dashboardContent->images) {
                Storage::disk('public')->delete($dashboardContent->images);
            }

            if ($dashboardContent->videos) {
                Storage::disk('public')->delete($dashboardContent->videos);
            }

            $dashboardContent->delete();

            return redirect()->route('dashboard-content.index')->with('success', '¡Contenido del dashboard eliminado con éxito!');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error al eliminar contenido: ' . $e->getMessage());

            return redirect()->back()->with('error', 'No se pudo eliminar el contenido.');
        }
    }
}
