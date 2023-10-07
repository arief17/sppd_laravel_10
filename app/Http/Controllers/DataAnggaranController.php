<?php

namespace App\Http\Controllers;

use App\Models\DataAnggaran;
use App\Models\UangKeluar;
use App\Models\UangMasuk;
use Illuminate\Http\Request;

class DataAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.perdin.data-anggaran.index', [
            'title' => 'Daftar Data Anggaran',
            'data_anggarans' => DataAnggaran::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.perdin.data-anggaran.create', [
            'title' => 'Tambah Data Anggaran',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nowDate = now()->format('F-Y');
    
        $validatedData['slug'] = $nowDate;
        $validatedData['author_id'] = auth()->user()->id;
    
        $existingData = DataAnggaran::where('slug', $nowDate)->first();
    
        if ($existingData) {
            $existingData->update(['saldo_awal' => $existingData->saldo_akhir]);
    
            $uangMasuk = UangMasuk::where('slug', $nowDate)->sum('saldo');
            $uangKeluar = UangKeluar::where('slug', $nowDate)->sum('saldo');
            $existingData->saldo_akhir = $existingData->saldo_awal + $uangMasuk - $uangKeluar;
            $existingData->save();
        } else {
            $lastMonth = DataAnggaran::where('created_at', now()->subMonth())->value('saldo_akhir');
            $validatedData['saldo_awal'] = $lastMonth;
    
            $uangMasuk = UangMasuk::where('slug', $nowDate)->sum('saldo');
            $uangKeluar = UangKeluar::where('slug', $nowDate)->sum('saldo');
            $validatedData['saldo_akhir'] = $lastMonth + $uangMasuk - $uangKeluar;
    
            DataAnggaran::create($validatedData);
        }
    
        return redirect()->route('data-anggaran.index')->with('success', 'Data Anggaran berhasil ditambahkan atau diperbarui!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(DataAnggaran $dataAnggaran)
    {
        return view('dashboard.perdin.data-anggaran.show', [
            'title' => 'Detail Data Anggaran',
            'data_anggaran' => $dataAnggaran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAnggaran $dataAnggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataAnggaran $dataAnggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAnggaran $dataAnggaran)
    {
        $dataAnggaran->delete();
        return redirect()->route('data-anggaran.index')->with('success', 'Data Anggaran berhasil dihapus!');
    }
}
