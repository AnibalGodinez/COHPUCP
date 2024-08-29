<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecurityQuestion;

class SecurityQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:indice preguntas de seguridad', ['only' => ['index']]);
        $this->middleware('permission:actualizar preguntas de seguridad', ['only' => ['update', 'edit']]);
        $this->middleware('permission:crear preguntas de seguridad', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar preguntas de seguridad', ['only' => ['destroy']]);
        $this->middleware('permission:ver opciones de recuperacion contaseña', ['only' => ['viewOpcionRecuperacion']]);
        $this->middleware('permission:ver preguntas de seguridad', ['only' => ['view']]);
    }

    public function index()
    {
        $questions = SecurityQuestion::all();
        return view('preguntas-seguridad.index', compact('questions'));
    }

//------------------------------------------------------------------------------------------
    public function create()
    {
        return view('preguntas-seguridad.create');
    }

//------------------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255|unique:security_questions,question',
        ], [
            'question.unique' => 'Esta pregunta de seguridad ya existe',
        ]);

        SecurityQuestion::create([
            'question' => $request->question,
        ]);

        return redirect()->route('security_questions.index')
            ->with('status', '¡Pregunta de seguridad creada con éxito!');
    }

//------------------------------------------------------------------------------------------
    public function edit($id)
    {
        $question = SecurityQuestion::findOrFail($id);
        return view('preguntas-seguridad.edit', compact('question'));
    }

//------------------------------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255|unique:security_questions,question,' . $id,
        ], [
            'question.unique' => 'Esta pregunta de seguridad ya existe',
        ]);

        $question = SecurityQuestion::findOrFail($id);
        $question->update([
            'question' => $request->question,
        ]);

        return redirect()->route('security_questions.index')->with('status', '¡Pregunta de seguridad actualizada con éxito!');
}

//------------------------------------------------------------------------------------------
    public function destroy($id)
    {
        $question = SecurityQuestion::findOrFail($id);
        $question->delete();

        return redirect()->route('security_questions.index')->with('status', '¡Pregunta de seguridad eliminada con éxito!');
    }

//------------------------------------------------------------------------------------------
    // Muestra la vista de opciones de recuperación (si por preguntas o correo)
    public function viewOpcionRecuperacion()
    {
        $securityQuestions = SecurityQuestion::all();
        return view('preguntas-seguridad.view-options', compact('securityQuestions'));
    }

    public function view(Request $request)
    {
        $questions = SecurityQuestion::all();
        return view('preguntas-seguridad.view', compact('questions'));
    }
}
