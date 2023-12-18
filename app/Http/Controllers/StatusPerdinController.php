<?php

namespace App\Http\Controllers;

use App\Models\StatusPerdin;
use Illuminate\Http\Request;

class StatusPerdinController extends Controller
{
    public function approve($id)
    {
        StatusPerdin::where('id', $id)->update(['approve' => 1]);
        return redirect()->route('data-perdin.index', 'no_laporan')->with('success', 'Status Perdin berhasil diperbarui!');
    }
    
    public function tolak($id)
    {
        $validatedData = request()->validate([
            'alasan_tolak' => 'required',
        ]);

        $validatedData['approve'] = 0;
        
        StatusPerdin::where('id', $id)->update($validatedData);
        return redirect()->route('data-perdin.index', 'no_laporan')->with('success', 'Status Perdin berhasil diperbarui!');
    }

    public function apiApprove(Request $request)
    {
        $id = $request->query('id');
        StatusPerdin::where('id', $id)->update(['approve' => 1]);
        return response()->json(['message' => 'Status Perdin berhasil diapprove'], 200);
    }
    
    public function apiTolak(Request $request)
    {
        $validatedData = request()->validate([
            'alasan_tolak' => 'required',
        ]);

        $validatedData['approve'] = 0;
        $id = $request->query('id');
        
        StatusPerdin::where('id', $id)->update($validatedData);
        return response()->json(['message' => 'Status Perdin berhasil ditolak'], 200);
    }
}
