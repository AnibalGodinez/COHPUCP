<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecurityQuestion;

class SecurityQuestionController extends Controller
{
    // Mostrar todas las preguntas de seguridad
    public function index()
    {
        $questions = SecurityQuestion::all();
        return view('preguntas-seguridad.index', compact('questions'));
    }

    // Mostrar formulario para crear nueva pregunta de seguridad
    public function create()
    {
        return view('preguntas-seguridad.create');
    }

    // Almacenar nueva pregunta de seguridad
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        SecurityQuestion::create([
            'question' => $request->question,
        ]);

        return redirect()->route('security_questions.index')
            ->with('success', 'Pregunta de seguridad creada correctamente.');
    }

    // Mostrar una pregunta de seguridad específica
public function show($id)
{
    $question = SecurityQuestion::findOrFail($id);
    $questions = SecurityQuestion::all(); // Obtener todas las preguntas
    return view('preguntas-seguridad.show', compact('question', 'questions'));
}


    // Mostrar formulario para editar pregunta de seguridad
    public function edit($id)
    {
        $question = SecurityQuestion::findOrFail($id);
        return view('preguntas-seguridad.edit', compact('question'));
    }

    // Actualizar pregunta de seguridad
    public function update(Request $request, $id)
    {
        // Validar la pregunta
        $request->validate([
            'question' => 'required|string|max:255|unique:security_questions,question,'.$id,
        ]);

        // Buscar y actualizar la pregunta
        $question = SecurityQuestion::findOrFail($id);
        $question->update([
            'question' => $request->question,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('security_questions.index')->with('success', 'Pregunta de seguridad actualizada correctamente.');
    }

    // Eliminar pregunta de seguridad
public function destroy($id)
{
    $question = SecurityQuestion::findOrFail($id);
    $question->delete();

    return redirect()->route('security_questions.index')->with('success', 'Pregunta de seguridad eliminada correctamente.');
}

    // Muestra la vista de opciones de recuperación (si esto es lo que se pretende)
    public function viewOpcionRecuperacion()
    {
        return view('preguntas-seguridad.view-options');
    }
}
