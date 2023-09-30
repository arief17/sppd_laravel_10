<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.provinsi.index', [
            'title' => 'Daftar Provinsi',
            'provinsis' => Provinsi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.provinsi.create', [
            'title' => 'Tambah Provinsi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Provinsi::class, 'slug', $request->nama);
        $validatedData['author'] = auth()->user()->id;
        
        Provinsi::create($validatedData);
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinsi $provinsi)
    {
        return view('dashboard.provinsi.show', [
            'title' => 'Detail Provinsi',
            'provinsi' => $provinsi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provinsi $provinsi)
    {
        return view('dashboard.provinsi.edit', [
            'title' => 'Perbarui Provinsi',
            'provinsi' => $provinsi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Provinsi::class, 'slug', $request->nama);
        $validatedData['author'] = auth()->user()->id;
        
        Provinsi::where('id', $provinsi->id)->update($validatedData);
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus!');
    }
}
