<?php

namespace App\Http\Controllers;

use App\Models\WelcomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeContentController extends Controller
{
    public function index()
    {
        $contents = WelcomeContent::all();
        return view('welcome-content.index', compact('contents'));
    }

    public function create()
    {
        return view('welcome-content.create');
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'layout' => 'nullable|string|in:Por defecto,Imagen a la derecha,Imagen a la izquierda,Imagen,Imagen de fondo oscuro,Imagen de fondo claro',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:2048',
        ]);

        // Manejar la imagen si se ha subido
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('welcome_images', 'public');
        }

        // Crear el nuevo contenido de bienvenida
        WelcomeContent::create([
            'title' => $validatedData['title'] ?? null,
            'description' => $validatedData['description'] ?? null,
            'image_path' => $imagePath,
            'layout' => $validatedData['layout'], // Guardar el diseño seleccionado
            'user_id' => auth()->id(), // Asignar el ID del usuario autenticado
        ]);

        return redirect()->route('welcome-content.index')->with('success', 'El contenido se ha añadido exitosamente.');
    }

    public function edit(WelcomeContent $welcomeContent)
    {
        return view('welcome-content.edit', compact('welcomeContent'));
    }

    public function update(Request $request, WelcomeContent $welcomeContent)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'layout' => 'nullable|string|in:Por defecto,Imagen a la derecha,Imagen a la izquierda,Imagen,Imagen de fondo oscuro',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:2048',
            'remove_image' => 'nullable|boolean', // Para manejar la eliminación de imagen
        ]);

        // Manejar la eliminación de imagen si el checkbox está marcado
        if ($request->input('remove_image')) {
            if ($welcomeContent->image_path) {
                // Eliminar la imagen del almacenamiento
                Storage::disk('public')->delete($welcomeContent->image_path);
                $welcomeContent->image_path = null; // Establecer image_path a null
            }
        } else {
            // Manejar la imagen si se ha subido una nueva
            if ($request->hasFile('image_path')) {
                // Borrar la imagen anterior si existe
                if ($welcomeContent->image_path) {
                    Storage::disk('public')->delete($welcomeContent->image_path);
                }
                $imagePath = $request->file('image_path')->store('welcome_images', 'public');
                $validated['image_path'] = $imagePath;
            } else {
                // Mantener la imagen actual si no se sube una nueva
                $validated['image_path'] = $welcomeContent->image_path;
            }
        }

        // Actualizar el contenido de bienvenida con los datos validados
        $welcomeContent->update(array_merge($validated, [
            'layout' => $request->input('layout'), // Actualizar el diseño
        ]));

        return redirect()->route('welcome-content.index')->with('success', 'El contenido se ha actualizado exitosamente.');
    }


    public function destroy(WelcomeContent $welcomeContent)
    {
        // Borrar la imagen si existe
        if ($welcomeContent->image_path) {
            Storage::disk('public')->delete($welcomeContent->image_path);
        }
        $welcomeContent->delete();
        return redirect()->route('welcome-content.index')->with('success', 'El contenido se ha eliminado exitosamente.');
    }
}
