<?php

namespace App\Http\Controllers;

use App\Models\StatusPerdin;
use Illuminate\Http\Request;

class StatusPerdinController extends Controller
{
    public function approve(Request $request)
    {
        StatusPerdin::where('id', $request->id)->update(['approve' => 1]);
        return redirect()->route('data-perdin.index', 'no_laporan')->with('success', 'Status Perdin berhasil diperbarui!');
    }
    
    public function tolak(Request $request)
    {
        $validatedData = $request->validate([
            'alasan_tolak' => 'required',
        ]);

        $validatedData['approve'] = 0;
        
        StatusPerdin::where('id', $request->id)->update($validatedData);
        return redirect()->route('data-perdin.index', 'no_laporan')->with('success', 'Status Perdin berhasil diperbarui!');
    }
}
