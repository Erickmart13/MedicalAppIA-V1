<?php

namespace App\Http\Controllers;

use App\Models\Office;
use PDF;
use Illuminate\Http\Request;
use App\Models\OfficeAssignment;

class ReportController extends Controller
{
    public function generatePDF()
{
    $assignments = OfficeAssignment::all(); // Obtén todas las asignaciones de consultorios
    $offices = Office::where('active', 1)->get();
    // Agrupa las asignaciones por estado (disponible u ocupado)
    // $reportData = $assignments->groupBy(function ($assignment) {
    //     return $assignment->office->active == 0 ? 'Ocupado' : 'Disponible';
    // });

    $pdf = PDF::loadView('reports.consultorios_pdf', compact('assignments','offices'));

    return $pdf->download('reporte_consultorios.pdf');
}
}