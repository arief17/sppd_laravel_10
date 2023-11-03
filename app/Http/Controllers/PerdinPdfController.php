<?php

namespace App\Http\Controllers;

use App\Models\DataPerdin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PerdinPdfController extends Controller
{
    public function spt($status_id)
    {
        setlocale(LC_ALL, 'IND');
        
        $data_perdin = DataPerdin::find($status_id);

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.spt', [
            'data_perdin' => $data_perdin,
        ]);

        return $pdf->stream();
    }
    public function visum1($status_id)
    {
        setlocale(LC_ALL, 'IND');

        $data_perdin = DataPerdin::find($status_id);

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum1', [
            'data_perdin' => $data_perdin,
        ]);

        return $pdf->stream();
    }
    public function visum2($status_id)
    {
        setlocale(LC_ALL, 'IND');

        $data_perdin = DataPerdin::find($status_id);

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum2', [
            'data_perdin' => $data_perdin,
        ]);

        return $pdf->stream();
    }
}
