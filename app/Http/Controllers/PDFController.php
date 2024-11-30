<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $assignments = Assignment::with(['material.course', 'userSubmissions'])->get();

        $pdf = PDF::loadView('pdf.assignment', compact('assignments'));
        return $pdf->download('assignments.pdf');
    }
}
