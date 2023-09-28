<?php

namespace App\Http\Controllers;

use App\Models\UangTransport;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class UangTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.uang-transport.index', [
            'title' => 'Daftar Uang Transport',
            'uang_transports' => UangTransport::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.uang-transport.create', [
            'title' => 'Tambah Uang Transport',
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
        
        $validatedData['slug'] = SlugService::createSlug(UangTransport::class, 'slug', $request->keterangan);
        $validatedData['author'] = auth()->user()->id;
        
        UangTransport::create($validatedData);
        return redirect()->route('dashboard.uang-transport.index')->with('success', 'Uang Transport berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UangTransport $uangTransport)
    {
        return view('dashboard.uang-transport.show', [
            'title' => 'Detail Uang Transport',
            'uang_transport' => $uangTransport,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UangTransport $uangTransport)
    {
        return view('dashboard.uang-transport.edit', [
            'title' => 'Perbarui Uang Transport',
            'uang_transport' => $uangTransport,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UangTransport $uangTransport)
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
        
        $validatedData['slug'] = SlugService::createSlug(UangTransport::class, 'slug', $request->keterangan);
        $validatedData['author'] = auth()->user()->id;
        
        UangTransport::update($validatedData);
        return redirect()->route('dashboard.uang-transport.index')->with('success', 'Uang Transport berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UangTransport $uangTransport)
    {
        $uangTransport->delete();
        return redirect()->route('dashboard.uang-transport.index')->with('success', 'Uang Transport berhasil dihapus!');
    }
}
