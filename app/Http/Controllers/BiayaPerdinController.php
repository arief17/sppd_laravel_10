<?php

namespace App\Http\Controllers;

use App\Models\BiayaPerdin;
use App\Models\Area;
use App\Models\KotaKabupaten;
use App\Models\UangHarian;
use App\Models\UangTransport;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BiayaPerdinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.biaya-perdin.index', [
            'title' => 'Daftar Biaya Perdin',
            'biaya_perdins' => BiayaPerdin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.biaya-perdin.create', [
            'title' => 'Tambah Biaya Perdin',
            'areas' => Area::all(),
            'kota_kabupatens' => KotaKabupaten::all(),
            'uang_transports' => UangTransport::all(),
            'uang_harians' => UangHarian::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'area_id' => 'required',
            'dari_id' => 'required',
            'ke_id' => 'required',
            'transport_id' => 'required',
            'harian_id' => 'required',
        ]);

        $area = Area::where('id', $request->area_id)->get('nama');
        $dari = KotaKabupaten::where('id', $request->dari_id)->get('nama');
        $ke = KotaKabupaten::where('id', $request->ke_id)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(BiayaPerdin::class, 'slug', "$area $dari $ke");
        $validatedData['author_id'] = auth()->user()->id;
        
        BiayaPerdin::create($validatedData);
        return redirect()->route('biaya-perdin.index')->with('success', 'Biaya Perdin berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BiayaPerdin $biayaPerdin)
    {
        return view('dashboard.master.biaya-perdin.show', [
            'title' => 'Detail Biaya Perdin',
            'biaya_perdin' => $biayaPerdin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BiayaPerdin $biayaPerdin)
    {
        return view('dashboard.master.biaya-perdin.edit', [
            'title' => 'Perbarui Biaya Perdin',
            'biaya_perdin' => $biayaPerdin,
            'areas' => Area::all(),
            'kota_kabupatens' => KotaKabupaten::all(),
            'uang_transports' => UangTransport::all(),
            'uang_harians' => UangHarian::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BiayaPerdin $biayaPerdin)
    {
        $validatedData = $request->validate([
            'area_id' => 'required',
            'dari_id' => 'required',
            'ke_id' => 'required',
            'transport_id' => 'required',
            'harian_id' => 'required',
        ]);
        
        $area = Area::where('id', $request->area_id)->get('nama');
        $dari = KotaKabupaten::where('id', $request->dari_id)->get('nama');
        $ke = KotaKabupaten::where('id', $request->ke_id)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(BiayaPerdin::class, 'slug', "$area $dari $ke");
        $validatedData['author_id'] = auth()->user()->id;
        
        BiayaPerdin::where('id', $biayaPerdin->id)->update($validatedData);
        return redirect()->route('biaya-perdin.index')->with('success', 'Biaya Perdin berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiayaPerdin $biayaPerdin)
    {
        $biayaPerdin->delete();
        return redirect()->route('biaya-perdin.index')->with('success', 'Biaya Perdin berhasil dihapus!');
    }
}
