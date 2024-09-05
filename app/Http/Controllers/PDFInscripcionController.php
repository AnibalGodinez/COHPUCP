<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Inscripcion;

class PDFInscripcionController extends Controller
{
    // Método para previsualizar el PDF de una solicitud de inscripción basado en su ID
    public function preview($id)
    {
        $inscripcionFirma = Inscripcion::findOrFail($id); // Obtén la inscripción basada en el ID
        $numero_colegiacion = $inscripcionFirma->user->numero_colegiacion ?? 'No Disponible'; // Obtén el número de colegiación, si existe

        $pdf = Pdf::loadView('pdf.user-inscripcion', compact('inscripcion', 'numero_colegiacion')); // Carga la vista que generarás

        return $pdf->stream('solicitud_inscripcion.pdf'); // Muestra el PDF en el navegador
    }

    // Método para descargar el PDF de una solicitud de inscripción basado en su ID
    public function download($id)
    {
        $inscripcionFirma = Inscripcion::findOrFail($id); // Obtén la inscripción basada en el ID
        $numero_colegiacion = $inscripcionFirma->user->numero_colegiacion ?? 'No Disponible'; // Obtén el número de colegiación, si existe

        $pdf = Pdf::loadView('pdf.user-inscripcion', compact('inscripcion', 'numero_colegiacion')); // Carga la vista que generarás

        // Genera el nombre del archivo usando el nombre y apellido del usuario
        $fileName = 'Solicitud de Inscripción - ' . $inscripcionFirma->name . ' ' . $inscripcionFirma->apellido . '.pdf';

        return $pdf->download($fileName); // Descarga el PDF con el nombre personalizado
    }
}
