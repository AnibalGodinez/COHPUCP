<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;
use App\Models\User;

class PDFController extends Controller
{
    // Método para mostrar el PDF de un usuario basado en su ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        $pdf = Pdf::loadView('pdf.user-details', compact('user'));
        return $pdf->stream('user-details.pdf');
    }

    // Método para previsualizar el PDF de un usuario basado en su ID
    public function preview($id)
    {
        $user = User::findOrFail($id); // Obtén el usuario basado en el ID
        
        $pdf = Pdf::loadView('pdf.user-details', compact('user')); // Carga la vista que generarás

        return $pdf->stream('detalles_usuario.pdf'); // Muestra el PDF en el navegador
    }

    // Método para descargar el PDF de un usuario basado en su ID
    public function download($id)
    {
        $user = User::findOrFail($id); // Obtén el usuario basado en el ID

        $pdf = Pdf::loadView('pdf.user-details', compact('user')); // Carga la vista que generarás

        return $pdf->download('detalles_usuario.pdf'); // Descarga el PDF
    }
}
