<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.area.index', [
            'title' => 'Daftar Area',
            'areas' => Area::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.area.create', [
            'title' => 'Tambah Area',
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
        
        $validatedData['slug'] = SlugService::createSlug(Area::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Area::create($validatedData);
        return redirect()->route('area.index')->with('success', 'Area berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        return view('dashboard.master.area.show', [
            'title' => 'Detail Area',
            'area' => $area,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('dashboard.master.area.edit', [
            'title' => 'Perbarui Area',
            'area' => $area,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(Area::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Area::where('id', $area->id)->update($validatedData);
        return redirect()->route('area.index')->with('success', 'Area berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('area.index')->with('success', 'Area berhasil dihapus!');
    }
}
