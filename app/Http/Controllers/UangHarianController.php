<?php

namespace App\Http\Controllers;

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
        return view('dashboard.uang-harian.index', [
            'title' => 'Daftar Uang Harian',
            'uang_harians' => UangHarian::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.uang-harian.create', [
            'title' => 'Tambah Uang Harian',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'eselon_i' => 'required|number',
            'eselon_ii' => 'required|number',
            'eselon_iii' => 'required|number',
            'eselon_iv' => 'required|number',
            'golongan_iv' => 'required|number',
            'golongan_iii' => 'required|number',
            'golongan_ii' => 'required|number',
            'golongan_i' => 'required|number',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(UangHarian::class, 'slug', $request->keterangan);
        $validatedData['author'] = auth()->user()->id;
        
        UangHarian::create($validatedData);
        return redirect()->route('dashboard.uang-harian.index')->with('success', 'Uang Harian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangHarian $uangHarian)
    {
        return view('dashboard.uang-harian.show', [
            'title' => 'Detail Uang Harian',
            'uang_harian' => $uangHarian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangHarian $uangHarian)
    {
        return view('dashboard.uang-harian.edit', [
            'title' => 'Perbarui Uang Harian',
            'uang_harian' => $uangHarian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangHarian $uangHarian)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'eselon_i' => 'required|number',
            'eselon_ii' => 'required|number',
            'eselon_iii' => 'required|number',
            'eselon_iv' => 'required|number',
            'golongan_iv' => 'required|number',
            'golongan_iii' => 'required|number',
            'golongan_ii' => 'required|number',
            'golongan_i' => 'required|number',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(UangHarian::class, 'slug', $request->keterangan);
        $validatedData['author'] = auth()->user()->id;
        
        UangHarian::update($validatedData);
        return redirect()->route('dashboard.uang-harian.index')->with('success', 'Uang Harian berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangHarian $uangHarian)
    {
        $uangHarian->delete();
        return redirect()->route('dashboard.uang-harian.index')->with('success', 'Uang Harian berhasil dihapus!');
    }
}
