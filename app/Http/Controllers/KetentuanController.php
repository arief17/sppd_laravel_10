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
        return view('dashboard.master.ketentuan.index', [
            'title' => 'Daftar Ketentuan',
            'ketentuans' => Ketentuan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.ketentuan.create', [
            'title' => 'Tambah Ketentuan',
            'kegiatans' => Kegiatan::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required',
            'kode_rek_dalam_daerah' => 'required|integer',
            'kode_rek_luar_daerah' => 'required|integer',
            'pptk_id' => 'required',
            'bendahara_id' => 'required',
            'pelaksana_administrasi_id' => 'required',
        ]);

        $pptk = Pegawai::where('id', $request->pptk_id)->get('nama');
        $bendahara = Pegawai::where('id', $request->bendahara_id)->get('nama');
        $pelaksana_administrasi = Pegawai::where('id', $request->pelaksana_administrasi_id)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(Ketentuan::class, 'slug', "$pptk $bendahara $pelaksana_administrasi");
        $validatedData['author_id'] = auth()->user()->id;
        
        Ketentuan::create($validatedData);
        return redirect()->route('ketentuan.index')->with('success', 'Ketentuan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketentuan $ketentuan)
    {
        return view('dashboard.master.ketentuan.show', [
            'title' => 'Detail Ketentuan',
            'ketentuan' => $ketentuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketentuan $ketentuan)
    {
        return view('dashboard.master.ketentuan.edit', [
            'title' => 'Perbarui Ketentuan',
            'ketentuan' => $ketentuan,
            'kegiatans' => Kegiatan::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ketentuan $ketentuan)
    {
        $validatedData = $request->validate([
            'kegiatan_id' => 'required',
            'kode_rek_dalam_daerah' => 'required|integer',
            'kode_rek_luar_daerah' => 'required|integer',
            'pptk_id' => 'required',
            'bendahara_id' => 'required',
            'pelaksana_administrasi_id' => 'required',
        ]);
        
        $pptk = Pegawai::where('id', $request->pptk_id)->get('nama');
        $bendahara = Pegawai::where('id', $request->bendahara_id)->get('nama');
        $pelaksana_administrasi = Pegawai::where('id', $request->pelaksana_administrasi_id)->get('nama');
        
        $validatedData['slug'] = SlugService::createSlug(Ketentuan::class, 'slug', "$pptk $bendahara $pelaksana_administrasi");
        $validatedData['author_id'] = auth()->user()->id;
        
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
