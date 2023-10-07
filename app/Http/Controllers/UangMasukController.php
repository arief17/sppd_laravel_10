<?php

namespace App\Http\Controllers;

use App\Models\UangMasuk;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.perdin.uang-masuk.index', [
            'title' => 'Daftar Uang Masuk',
            'uang_masuks' => UangMasuk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.perdin.uang-masuk.create', [
            'title' => 'Tambah Uang Masuk',
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
        $validatedData['slug'] = SlugService::createSlug(UangMasuk::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangMasuk::create($validatedData);
        return redirect()->route('uang-masuk.index')->with('success', 'Uang Masuk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangMasuk $uangMasuk)
    {
        return view('dashboard.perdin.uang-masuk.show', [
            'title' => 'Detail Uang Masuk',
            'uang_masuk' => $uangMasuk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangMasuk $uangMasuk)
    {
        return view('dashboard.perdin.uang-masuk.edit', [
            'title' => 'Perbarui Uang Masuk',
            'uang_masuk' => $uangMasuk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangMasuk $uangMasuk)
    {
        $validatedData = $request->validate([
            'tgl_masuk' => 'required|date',
            'keterangan' => 'required',
            'saldo' => 'required|integer',
        ]);
        
        $validatedData['anggaran_slug'] = now()->format('F-Y');
        $validatedData['tgl_input'] = now();
        $validatedData['slug'] = SlugService::createSlug(UangMasuk::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangMasuk::where('id', $uangMasuk->id)->update($validatedData);
        return redirect()->route('uang-masuk.index')->with('success', 'Uang Masuk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangMasuk $uangMasuk)
    {
        $uangMasuk->delete();
        return redirect()->route('uang-masuk.index')->with('success', 'Uang Masuk berhasil dihapus!');
    }
}
