<?php

namespace App\Http\Controllers;

use App\Models\DataPerdin;
use App\Models\LaporanPerdin;
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

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function visum1($status_id)
    {
        setlocale(LC_ALL, 'IND');

        $data_perdin = DataPerdin::find($status_id);

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum1', [
            'data_perdin' => $data_perdin,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function visum2($status_id)
    {
        setlocale(LC_ALL, 'IND');

        $data_perdin = DataPerdin::find($status_id);

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum2', [
            'data_perdin' => $data_perdin,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
    public function lap($id)
    {
        setlocale(LC_ALL, 'IND');

        $laporan_perdin = LaporanPerdin::find($id);

        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.lap', [
            'laporan_perdin' => $laporan_perdin,
        ]);

        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');

        return $pdf->stream();
    }
}
