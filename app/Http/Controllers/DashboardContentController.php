<?php

namespace App\Http\Controllers;

use App\Models\DashboardContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardContentController extends Controller
{
    // Mostrar una lista de todos los contenidos del dashboard
    public function index()
    {
        $dashboardContents = DashboardContent::all();
        return view('dashboard_contents.index', compact('dashboardContents'));
    }

    // Mostrar el formulario para crear un nuevo contenido del dashboard
    public function create()
    {
        return view('dashboard_contents.create');
    }

    // Almacenar un nuevo contenido del dashboard
    public function store(Request $request)
    {
        $request->validate([
            'layout' => 'nullable|string',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'bar_charts' => 'nullable|json',
            'pie_charts' => 'nullable|json',
            'data_tables' => 'nullable|json',
            'task_lists' => 'nullable|json',
            'pdf_files' => 'nullable|json',
            'documents' => 'nullable|json',
            'internal_links' => 'nullable|json',
            'external_links' => 'nullable|json',
            'images' => 'nullable|json',
            'videos' => 'nullable|json',
            'calendars' => 'nullable|json',
            'maps' => 'nullable|json',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'user_id' => 'nullable|exists:users,id',
        ]);

        DashboardContent::create($request->all());

        return Redirect::route('dashboard_contents.index')->with('success', 'Contenido del dashboard creado exitosamente.');
    }

    // Mostrar el contenido del dashboard específico
    public function show(DashboardContent $dashboardContent)
    {
        return view('dashboard_contents.show', compact('dashboardContent'));
    }

    // Mostrar el formulario para editar un contenido del dashboard
    public function edit(DashboardContent $dashboardContent)
    {
        return view('dashboard_contents.edit', compact('dashboardContent'));
    }

    // Actualizar un contenido del dashboard existente
    public function update(Request $request, DashboardContent $dashboardContent)
    {
        $request->validate([
            'layout' => 'nullable|string',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'bar_charts' => 'nullable|json',
            'pie_charts' => 'nullable|json',
            'data_tables' => 'nullable|json',
            'task_lists' => 'nullable|json',
            'pdf_files' => 'nullable|json',
            'documents' => 'nullable|json',
            'internal_links' => 'nullable|json',
            'external_links' => 'nullable|json',
            'images' => 'nullable|json',
            'videos' => 'nullable|json',
            'calendars' => 'nullable|json',
            'maps' => 'nullable|json',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $dashboardContent->update($request->all());

        return Redirect::route('dashboard_contents.index')->with('success', 'Contenido del dashboard actualizado exitosamente.');
    }

    // Eliminar un contenido del dashboard
    public function destroy(DashboardContent $dashboardContent)
    {
        $dashboardContent->delete();

        return Redirect::route('dashboard_contents.index')->with('success', 'Contenido del dashboard eliminado exitosamente.');
    }
}
