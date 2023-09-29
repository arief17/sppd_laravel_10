<?php

namespace App\Http\Controllers;

use App\Models\BiayaPerdin;
use App\Models\JenisPerdin;
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
        return view('dashboard.biaya-perdin.index', [
            'title' => 'Daftar Biaya Perdin',
            'biaya_perdins' => BiayaPerdin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.biaya-perdin.create', [
            'title' => 'Tambah Biaya Perdin',
            'jenis_perdins' => JenisPerdin::all(),
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
            'area' => 'required',
            'dari' => 'required',
            'ke' => 'required',
            'transport' => 'required',
            'harian' => 'required',
        ]);

        $area = JenisPerdin::where('id', $request->area)->get('nama');
        $dari = KotaKabupaten::where('id', $request->dari)->get('nama');
        $ke = KotaKabupaten::where('id', $request->ke)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(BiayaPerdin::class, 'slug', "$area $dari $ke");
        $validatedData['author'] = auth()->user()->id;
        
        BiayaPerdin::create($validatedData);
        return redirect()->route('biaya-perdin.index')->with('success', 'Biaya Perdin berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BiayaPerdin $biayaPerdin)
    {
        return view('dashboard.biaya-perdin.show', [
            'title' => 'Detail Biaya Perdin',
            'biaya_perdin' => $biayaPerdin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BiayaPerdin $biayaPerdin)
    {
        return view('dashboard.biaya-perdin.edit', [
            'title' => 'Perbarui Biaya Perdin',
            'biaya_perdin' => $biayaPerdin,
            'jenis_perdins' => JenisPerdin::all(),
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
            'area' => 'required',
            'dari' => 'required',
            'ke' => 'required',
            'transport' => 'required',
            'harian' => 'required',
        ]);
        
        $area = JenisPerdin::where('id', $request->area)->get('nama');
        $dari = KotaKabupaten::where('id', $request->dari)->get('nama');
        $ke = KotaKabupaten::where('id', $request->ke)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(BiayaPerdin::class, 'slug', "$area $dari $ke");
        $validatedData['author'] = auth()->user()->id;
        
        BiayaPerdin::update($validatedData);
        return redirect()->route('biaya-perdin.index')->with('success', 'Biaya Perdin berhasil ditambahkan!');
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
