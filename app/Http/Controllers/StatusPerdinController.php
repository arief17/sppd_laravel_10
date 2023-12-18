<?php

namespace App\Http\Controllers;

use App\Models\StatusPerdin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $id = $request->get('id');
        DB::table('data_perdins')
            ->join('status_perdins','data_perdins.status_id','=','status_perdins.id')
            ->where('data_perdins.id',$id)
            ->update([
                'status_perdins.approve' => 1,
            ]);
        // StatusPerdin::where('id', $id)->update(['approve' => 1]);
        return response()->json(['message' => 'Status Perdin berhasil diapprove'], 200);
        // return response()->json(['message' => $id], 200);
    }
    
    public function apiTolak(Request $request)
    {
        $id = $request->query('id');
        $alasan_tolak = $request->query('alasan_tolak');
        
        $dataToUpdate = [
            'approve' => 0,
            'alasan_tolak' => $alasan_tolak,
        ];
        
        StatusPerdin::where('id', $id)->update($dataToUpdate);
        
        return response()->json(['message' => 'Status Perdin berhasil ditolak'], 200);
    }
}
