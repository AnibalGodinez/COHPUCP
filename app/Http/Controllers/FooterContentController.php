<?php

namespace App\Http\Controllers;

use App\Models\FooterContent;
use Illuminate\Http\Request;


class FooterContentController extends Controller
{
    // Mostrar una lista de todos los registros
    public function index()
    {
        $footerContents = FooterContent::all();
        return view('footer-content.index', compact('footerContents'));
    }

    // Método para cargar los datos en la vista del pie de página
    public function loadFooterContent()
    {
        $footerContents = FooterContent::all();
        return view('footer-content.index', compact('footerContents'));
    }

    // Mostrar el formulario para crear un nuevo registro
    public function create()
    {
        return view('footer-content.create'); 
    }

    // Almacenar un nuevo registro en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'links' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'telegram_link' => 'nullable|url',
            'linkendin_link' => 'nullable|url', 
            'boton' => 'nullable|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        FooterContent::create($request->all());

        return redirect()->route('footer-content.index')->with('success', 'Footer content created successfully.');
    }

    // Mostrar el formulario para editar un registro existente
    public function edit($id)
    {
        $footerContent = FooterContent::findOrFail($id);
        return view('footer-content.edit', compact('footerContent')); // Ajusta la vista según tus necesidades
    }

    // Actualizar un registro existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'links' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'telegram_link' => 'nullable|url',
            'linkendin_link' => 'nullable|url',
            'boton' => 'nullable|string|max:255',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $footerContent = FooterContent::findOrFail($id);
        $footerContent->update($request->all());

        return redirect()->route('footer-content.index')->with('success', 'Footer content updated successfully.');
    }

    // Eliminar un registro existente de la base de datos
    public function destroy($id)
    {
        $footerContent = FooterContent::findOrFail($id);
        $footerContent->delete();

        return redirect()->route('footer-content.index')->with('success', 'Footer content deleted successfully.');
    }
}
