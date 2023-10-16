<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.ruang.index', [
            'title' => 'Daftar Ruang',
            'ruangs' => Ruang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.ruang.create', [
            'title' => 'Tambah Ruang',
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
        
        $validatedData['slug'] = SlugService::createSlug(Ruang::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Ruang::create($validatedData);
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        return view('dashboard.master.ruang.show', [
            'title' => 'Detail Ruang',
            'ruang' => $ruang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        return view('dashboard.master.ruang.edit', [
            'title' => 'Perbarui Ruang',
            'ruang' => $ruang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Ruang::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Ruang::where('id', $ruang->id)->update($validatedData);
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus!');
    }
}
