<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pegawai.index', [
            'title' => 'Daftar Pegawai',
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pegawai.create', [
            'title' => 'Tambah Pegawai',
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'nip' => 'required|unique:pegawais|max:8',
            'ruang' => 'required|max:10',
            'eselon_id' => 'required',
            'jabatan_id' => 'required',
            'pptk' => '',
        ]);

        if (!$request->pptk) {
            $validatedData['pptk'] = 0;
        }
        
        $validatedData['slug'] = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Pegawai::create($validatedData);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.show', [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.edit', [
            'title' => 'Perbarui Pegawai',
            'pegawai' => $pegawai,
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'nip' => 'required|number|unique:pegawais|max:8',
            'ruang' => 'required|max:10',
            'eselon_id' => 'required',
            'jabatan_id' => 'required',
            'pptk' => '',
        ]);

        if (!$request->pptk) {
            $validatedData['pptk'] = 0;
        }
        
        $validatedData['slug'] = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;
        
        Pegawai::where('id', $pegawai->id)->update($validatedData);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
