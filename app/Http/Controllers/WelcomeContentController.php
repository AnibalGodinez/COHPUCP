<?php

namespace App\Http\Controllers;

use App\Models\WelcomeContent;
use Illuminate\Http\Request;

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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Manejar la imagen si se ha subido
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('welcome_images', 'public');
        }

        // Crear el nuevo contenido de bienvenida
        WelcomeContent::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image_path' => $imagePath,
            'user_id' => auth()->id(), // Asignar el ID del usuario autenticado
        ]);

        return redirect()->route('welcome-content.index')->with('success', 'Contenido de bienvenida creado correctamente.');
    }

    public function edit(WelcomeContent $welcomeContent)
    {
        return view('welcome-content.edit', compact('welcomeContent'));
    }

    public function update(Request $request, WelcomeContent $welcomeContent)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejar la imagen si se ha subido
        if ($request->hasFile('image_path')) {
            // Borrar la imagen anterior si existe
            if ($welcomeContent->image_path) {
                \Storage::disk('public')->delete($welcomeContent->image_path);
            }
            $imagePath = $request->file('image_path')->store('welcome_images', 'public');
            $validated['image_path'] = $imagePath;
        }

        $welcomeContent->update($validated);

        return redirect()->route('welcome-content.index')->with('success', 'Contenido actualizado con éxito');
    }

    public function destroy(WelcomeContent $welcomeContent)
    {
        // Borrar la imagen si existe
        if ($welcomeContent->image_path) {
            \Storage::disk('public')->delete($welcomeContent->image_path);
        }
        $welcomeContent->delete();
        return redirect()->route('welcome-content.index')->with('success', 'Contenido eliminado con éxito');
    }
}
