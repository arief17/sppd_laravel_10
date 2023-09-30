<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ketentuan;
use App\Models\Pegawai;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class KetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.ketentuan.index', [
            'title' => 'Daftar Ketentuan',
            'ketentuans' => Ketentuan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ketentuan.create', [
            'title' => 'Tambah Ketentuan',
            'kegiatan' => Kegiatan::all(),
            'pptk' => Pegawai::all(),
            'bendahara' => Pegawai::all(),
            'pelaksana_administrasi' => Pegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kegiatan' => 'required',
            'kode_rek_dalam_daerah' => 'required|number',
            'kode_rek_luar_daerah' => 'required|number',
            'pptk' => 'required',
            'bendahara' => 'required',
            'pelaksana_administrasi' => 'required',
        ]);

        $pptk = Pegawai::where('id', $request->pptk)->get('nama');
        $bendahara = Pegawai::where('id', $request->bendahara)->get('nama');
        $pelaksana_administrasi = Pegawai::where('id', $request->pelaksana_administrasi)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(Ketentuan::class, 'slug', "$pptk $bendahara $pelaksana_administrasi");
        $validatedData['author'] = auth()->user()->id;
        
        Ketentuan::create($validatedData);
        return redirect()->route('ketentuan.index')->with('success', 'Ketentuan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketentuan $ketentuan)
    {
        return view('dashboard.ketentuan.show', [
            'title' => 'Detail Ketentuan',
            'ketentuan' => $ketentuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketentuan $ketentuan)
    {
        return view('dashboard.ketentuan.edit', [
            'title' => 'Perbarui Ketentuan',
            'ketentuan' => $ketentuan,
            'kegiatan' => Kegiatan::all(),
            'pptk' => Pegawai::all(),
            'bendahara' => Pegawai::all(),
            'pelaksana_administrasi' => Pegawai::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ketentuan $ketentuan)
    {
        $validatedData = $request->validate([
            'kegiatan' => 'required',
            'kode_rek_dalam_daerah' => 'required|number',
            'kode_rek_luar_daerah' => 'required|number',
            'pptk' => 'required',
            'bendahara' => 'required',
            'pelaksana_administrasi' => 'required',
        ]);
        
        $pptk = Pegawai::where('id', $request->pptk)->get('nama');
        $bendahara = Pegawai::where('id', $request->bendahara)->get('nama');
        $pelaksana_administrasi = Pegawai::where('id', $request->pelaksana_administrasi)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(Ketentuan::class, 'slug', "$pptk $bendahara $pelaksana_administrasi");
        $validatedData['author'] = auth()->user()->id;
        
        Ketentuan::where('id', $ketentuan->id)->update($validatedData);
        return redirect()->route('ketentuan.index')->with('success', 'Ketentuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ketentuan $ketentuan)
    {
        $ketentuan->delete();
        return redirect()->route('ketentuan.index')->with('success', 'Ketentuan berhasil dihapus!');
    }
}
