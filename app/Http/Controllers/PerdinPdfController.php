<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\DataPerdin;
use App\Models\LaporanPerdin;
use Barryvdh\DomPDF\Facade\Pdf;

class PerdinPdfController extends Controller
{
    public function spt($slug)
    {        
        App::setLocale('id');
        $data_perdin = DataPerdin::where('slug', $slug)->first();
        
        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten.png')));
        $imgTtd = base64_encode(file_get_contents(public_path('uploads/' . $data_perdin->tanda_tangan->file_ttd)));
        
        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.spt', [
            'data_perdin' => $data_perdin,
            'imgLogo' => $imgLogo,
            'imgTtd' => $imgTtd,
        ]);
        
        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');
        
        return $pdf->stream();
    }
    
    public function visum1($slug)
    {
        App::setLocale('id');
        $data_perdin = DataPerdin::where('slug', $slug)->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten.png')));
        $imgTtd = base64_encode(file_get_contents(public_path('uploads/' . $data_perdin->tanda_tangan->file_ttd)));
        
        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum1', [
            'data_perdin' => $data_perdin,
            'imgLogo' => $imgLogo,
            'imgTtd' => $imgTtd,
        ]);
        
        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');
        
        return $pdf->stream();
    }
    public function visum2($slug)
    {
        App::setLocale('id');
        $data_perdin = DataPerdin::where('slug', $slug)->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten.png')));
        $imgTtd = base64_encode(file_get_contents(public_path('uploads/' . $data_perdin->tanda_tangan->file_ttd)));
        
        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.visum2', [
            'data_perdin' => $data_perdin,
            'imgLogo' => $imgLogo,
            'imgTtd' => $imgTtd,
        ]);
        
        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');
        
        return $pdf->stream();
    }
    public function lap($id)
    {
        App::setLocale('id');
        $laporan_perdin = LaporanPerdin::where('id', $id)->first();

        $imgLogo = base64_encode(file_get_contents(public_path('assets/img/logo-banten.png')));
        
        $pdf = Pdf::loadView('dashboard.perdin.pdf-perdin.lap', [
            'laporan_perdin' => $laporan_perdin,
            'imgLogo' => $imgLogo,
        ]);
        
        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait');
        
        return $pdf->stream();
    }
}
