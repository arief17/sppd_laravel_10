<?php

namespace App\Http\Controllers;

use App\Models\KotaKabupaten;
use App\Models\Provinsi;
use App\Models\UangHarian;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.uang-harian.index', [
            'title' => 'Daftar Uang Harian',
            'uang_harians' => UangHarian::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.uang-harian.create', [
            'title' => 'Tambah Uang Harian',
            'kota_kabupatens' => KotaKabupaten::all(),
            'provinsis' => Provinsi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'eselon_i' => 'required|integer',
            'eselon_ii' => 'required|integer',
            'eselon_iii' => 'required|integer',
            'eselon_iv' => 'required|integer',
            'golongan_iv' => 'required|integer',
            'golongan_iii' => 'required|integer',
            'golongan_ii' => 'required|integer',
            'golongan_i' => 'required|integer',
        ]);

        $wilayah = null;
        if ($request->wilayah == 'kota_kabupaten') {
            $wilayah = KotaKabupaten::find($request->kota_kabupaten_id);
        } elseif ($request->wilayah == 'provinsi') {
            $wilayah = Provinsi::find($request->provinsi_id);
        }
        $validatedData['wilayah_type'] = get_class($wilayah);
        $validatedData['wilayah_id'] = $wilayah->id;
        
        $validatedData['slug'] = SlugService::createSlug(UangHarian::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangHarian::create($validatedData);
        return redirect()->route('uang-harian.index')->with('success', 'Uang Harian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangHarian $uangHarian)
    {
        return view('dashboard.master.uang-harian.show', [
            'title' => 'Detail Uang Harian',
            'uang_harian' => $uangHarian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangHarian $uangHarian)
    {
        return view('dashboard.master.uang-harian.edit', [
            'title' => 'Perbarui Uang Harian',
            'uang_harian' => $uangHarian,
            'kota_kabupatens' => KotaKabupaten::all(),
            'provinsis' => Provinsi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangHarian $uangHarian)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'eselon_i' => 'required|integer',
            'eselon_ii' => 'required|integer',
            'eselon_iii' => 'required|integer',
            'eselon_iv' => 'required|integer',
            'golongan_iv' => 'required|integer',
            'golongan_iii' => 'required|integer',
            'golongan_ii' => 'required|integer',
            'golongan_i' => 'required|integer',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(UangHarian::class, 'slug', $request->keterangan);
        $validatedData['author_id'] = auth()->user()->id;
        
        UangHarian::where('id', $uangHarian->id)->update($validatedData);
        return redirect()->route('uang-harian.index')->with('success', 'Uang Harian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangHarian $uangHarian)
    {
        $uangHarian->delete();
        return redirect()->route('uang-harian.index')->with('success', 'Uang Harian berhasil dihapus!');
    }
}
