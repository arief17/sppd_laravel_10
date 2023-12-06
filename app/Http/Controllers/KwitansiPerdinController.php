<?php

namespace App\Http\Controllers;

use App\Models\KwitansiPerdin;
use App\Http\Controllers\Controller;
use App\Models\StatusPerdin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KwitansiPerdinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KwitansiPerdin $kwitansiPerdin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KwitansiPerdin $kwitansiPerdin)
    {
        return view('dashboard.perdin.kwitansi-perdin.edit', [
            'title' => 'Perbarui Kwitansi Perdin',
            'kwitansi_perdin' => $kwitansiPerdin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KwitansiPerdin $kwitansiPerdin)
    {
        return DB::transaction(function () use ($request, $kwitansiPerdin) {
            $validatedData = $request->validate([
                'tgl_bayar' => 'required|date',
                'no_rek' => 'required',
                'kegiatan_id' => 'required',
                'pptk_id' => 'required',
                'pegawai_id' => 'required',
            ]);
            
            $validatedData['author_id'] = auth()->user()->id;
            
            KwitansiPerdin::where('id', $kwitansiPerdin->id)->update($validatedData);
            StatusPerdin::where('id', $kwitansiPerdin->data_perdin->status_id)->update(['kwitansi' => 1]);
            return redirect()->back()->with('success', 'Kwitansi Perdin berhasil disimpan! Silahkan cetak Kwitansi!');
        }, 2);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KwitansiPerdin $kwitansiPerdin)
    {
        //
    }
}
