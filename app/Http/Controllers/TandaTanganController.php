<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\TandaTangan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TandaTanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tanda-tangan.index', [
            'title' => 'Daftar Tanda Tangan',
            'tanda_tangans' => TandaTangan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tanda-tangan.create', [
            'title' => 'Tambah Tanda Tangan',
            'pegawais' => Pegawai::all(),
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'pegawai' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(TandaTangan::class, 'slug', $request->nama);
        $validatedData['author'] = auth()->user()->id;
        
        TandaTangan::create($validatedData);
        return redirect()->route('dashboard.tanda-tangan.index')->with('success', 'Tanda Tangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TandaTangan $tandaTangan)
    {
        return view('dashboard.tanda-tangan.show', [
            'title' => 'Detail Tanda Tangan',
            'tanda_tangan' => $tandaTangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TandaTangan $tandaTangan)
    {
        return view('dashboard.tanda-tangan.edit', [
            'title' => 'Perbarui Tanda Tangan',
            'tanda_tangan' => $tandaTangan,
            'pegawais' => Pegawai::all(),
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TandaTangan $tandaTangan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'pegawai' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(TandaTangan::class, 'slug', $request->nama);
        $validatedData['author'] = auth()->user()->id;
        
        TandaTangan::update($validatedData);
        return redirect()->route('dashboard.tanda-tangan.index')->with('success', 'Tanda Tangan berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TandaTangan $tandaTangan)
    {
        $tandaTangan->delete();
        return redirect()->route('dashboard.tanda-tangan.index')->with('success', 'Tanda Tangan berhasil dihapus!');
    }
}
