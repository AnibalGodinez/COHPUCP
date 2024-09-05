<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\InscripcionFirma;

class PDFInscripcionFirmaController extends Controller
{
    // Método para previsualizar el PDF de una solicitud de inscripción basado en su ID
    public function preview($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id); // Correctamente obtiene la inscripción
        $numero_colegiacion = $inscripcionFirma->user->numero_colegiacion ?? 'No Disponible'; // Obtiene el número de colegiación

        // Asegúrate de que las variables que pasas a la vista son las correctas
        $pdf = Pdf::loadView('pdf.user-inscripcionFirma', compact('inscripcionFirma', 'numero_colegiacion'));


        return $pdf->stream('solicitud_inscripcionFirma.pdf'); // Muestra el PDF en el navegador
    }

    // Método para descargar el PDF de una solicitud de inscripción basado en su ID
    public function download($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id); // Obtén la inscripción basada en el ID
        $numero_colegiacion = $inscripcionFirma->user->numero_colegiacion ?? 'No Disponible'; // Obtén el número de colegiación, si existe

        $pdf = Pdf::loadView('pdf.user-inscripcionFirma', compact('inscripcionFirma', 'numero_colegiacion')); // Carga la vista que generarás

        // Genera el nombre del archivo usando el nombre de la sociedad
        $fileName = 'Solicitud de Inscripción Firma- ' . $inscripcionFirma->nombre_sociedad . '.pdf';

        return $pdf->download($fileName); // Descarga el PDF con el nombre personalizado
    }
}
