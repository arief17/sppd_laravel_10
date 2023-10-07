<?php

namespace App\Http\Controllers;

use App\Models\UangKeluar;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.perdin.uang-keluar.index', [
            'title' => 'Daftar Uang Keluar',
            'uang_keluars' => UangKeluar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.perdin.uang-keluar.create', [
            'title' => 'Tambah Uang Keluar',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_masuk' => 'required|date',
            'keterangan' => 'required',
            'saldo' => 'required|integer',
        ]);
        
        $validatedData['anggaran_slug'] = now()->format('F-Y');
        $validatedData['tgl_input'] = now();
        $validatedData['slug'] = SlugService::createSlug(UangKeluar::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangKeluar::create($validatedData);
        return redirect()->route('uang-keluar.index')->with('success', 'Uang Keluar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangKeluar $uangKeluar)
    {
        return view('dashboard.perdin.uang-keluar.show', [
            'title' => 'Detail Uang Keluar',
            'uang_keluar' => $uangKeluar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangKeluar $uangKeluar)
    {
        return view('dashboard.perdin.uang-keluar.edit', [
            'title' => 'Perbarui Uang Keluar',
            'uang_keluar' => $uangKeluar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangKeluar $uangKeluar)
    {
        $validatedData = $request->validate([
            'tgl_masuk' => 'required|date',
            'keterangan' => 'required',
            'saldo' => 'required|integer',
        ]);
        
        $validatedData['anggaran_slug'] = now()->format('F-Y');
        $validatedData['tgl_input'] = now();
        $validatedData['slug'] = SlugService::createSlug(UangKeluar::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangKeluar::where('id', $uangKeluar->id)->update($validatedData);
        return redirect()->route('uang-keluar.index')->with('success', 'Uang Keluar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangKeluar $uangKeluar)
    {
        $uangKeluar->delete();
        return redirect()->route('uang-keluar.index')->with('success', 'Uang Keluar berhasil dihapus!');
    }
}
