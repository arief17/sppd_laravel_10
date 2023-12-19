<?php

namespace App\Http\Controllers;

use App\Models\DataPerdin;
use App\Models\StatusPerdin;
use Illuminate\Http\Request;

class StatusPerdinController extends Controller
{
    public function approve($id)
    {
        $status_id = DataPerdin::find($id)->select('status_id');
        StatusPerdin::where('id', $status_id)->update(['approve' => 1]);
        return redirect()->route('data-perdin.index', 'no_laporan')->with('success', 'Status Perdin berhasil diperbarui!');
    }
    
    public function tolak($id)
    {
        $validatedData = request()->validate([
            'alasan_tolak' => 'required',
        ]);
        
        $validatedData['approve'] = 0;
        
        $status_id = DataPerdin::find($id)->select('status_id');
        StatusPerdin::where('id', $status_id)->update($validatedData);
        return redirect()->route('data-perdin.index', 'no_laporan')->with('success', 'Status Perdin berhasil diperbarui!');
    }
    
    // public function apiApprove(Request $request)
    // {
    //     $id = $request->get('id');
    //     $status_id = DB::table('data_perdins')
    //         ->select('status_id')
    //         ->where('id',$id)
    //         ->first();
        
    //     DB::table('status_perdins')
    //         ->where('id',json_encode($status_id))
    //         ->update([
    //             'approve' => '1'
    //         ]);
    //     return response()->json(['message' => 'Status Perdin berhasil diapprove'], 200);
    // }

    public function apiApprove(Request $request)
    {
        $id = $request->get('id');
        $status_id = DataPerdin::find($id)->select('status_id');
        
        StatusPerdin::where('id', $status_id)->update(['approve' => 1]);
        return response()->json(['message' => 'Status Perdin berhasil diapprove'], 200);
    }
    
    public function apiTolak(Request $request)
    {
        $id = $request->query('id');
        $alasan_tolak = $request->query('alasan_tolak');
        
        $dataToUpdate = [
            'approve' => 0,
            'alasan_tolak' => $alasan_tolak,
        ];
        
        $status_id = DataPerdin::find($id)->select('status_id');
        StatusPerdin::where('id', $status_id)->update($dataToUpdate);
        
        return response()->json(['message' => 'Status Perdin berhasil ditolak'], 200);
    }
}
