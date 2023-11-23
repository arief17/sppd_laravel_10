<?php

namespace App\Http\Controllers;

use App\Models\KotaKabupaten;
use App\Models\Provinsi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KotaKabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.kota-kabupaten.index', [
            'title' => 'Daftar Kota/Kabupaten',
            'kota_kabupatens' => KotaKabupaten::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.kota-kabupaten.create', [
            'title' => 'Tambah Kota/Kabupaten',
            'provinsis' => Provinsi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'provinsi_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(KotaKabupaten::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        KotaKabupaten::create($validatedData);
        return redirect()->route('kota-kabupaten.index')->with('success', 'Kota/Kabupaten berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KotaKabupaten $kotaKabupaten)
    {
        return view('dashboard.master.kota-kabupaten.show', [
            'title' => 'Detail Kota/Kabupaten',
            'kota_kabupaten' => $kotaKabupaten,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KotaKabupaten $kotaKabupaten)
    {
        return view('dashboard.master.kota-kabupaten.edit', [
            'title' => 'Perbarui Kota/Kabupaten',
            'kota_kabupaten' => $kotaKabupaten,
            'provinsis' => Provinsi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KotaKabupaten $kotaKabupaten)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'provinsi_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(KotaKabupaten::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        KotaKabupaten::where('id', $kotaKabupaten->id)->update($validatedData);
        return redirect()->route('kota-kabupaten.index')->with('success', 'Kota/Kabupaten berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KotaKabupaten $kotaKabupaten)
    {
        $kotaKabupaten->delete();
        return redirect()->route('kota-kabupaten.index')->with('success', 'Kota/Kabupaten berhasil dihapus!');
    }
}
