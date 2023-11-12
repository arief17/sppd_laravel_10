<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Ketentuan;
use App\Models\Pegawai;
use App\Models\Pangkat;
use App\Models\Seksi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.pegawai.index', [
            'title' => 'Daftar Pegawai',
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.pegawai.create', [
            'title' => 'Tambah Pegawai',
            'seksis' => Seksi::all(),
            'pangkats' => Pangkat::all(),
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
            'nip' => 'required|numeric|unique:pegawais',
            'email' => 'required|email|unique:pegawais',
            'no_hp' => 'required|numeric|unique:pegawais',
            'seksi_id' => 'required',
            'golongan_id' => 'required',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'pptk' => 'boolean',
        ]);

        if (!$request->pptk) {
            $validatedData['pptk'] = 0;
        }

        $validatedData['slug'] = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
        $validatedData['author_id'] = auth()->user()->id;

        $ketentuan = Ketentuan::create(['author_id' => auth()->user()->id]);
        $validatedData['ketentuan_id'] = $ketentuan->id;

        Pegawai::create($validatedData);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('dashboard.master.pegawai.show', [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.master.pegawai.edit', [
            'title' => 'Perbarui Pegawai',
            'pegawai' => $pegawai,
            'seksis' => Seksi::all(),
            'pangkats' => Pangkat::all(),
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $rules = [
            'nama' => 'required|min:3|max:100',
            'seksi_id' => 'required',
            'golongan_id' => 'required',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'pptk' => '',
        ];

        if ($request->nip != $pegawai->nip) {
            $rules['nip'] = 'required|integer|unique:pegawais|max:20';
        }
        if ($request->email != $pegawai->email) {
            $rules['email'] = 'required|integer|unique:pegawais|max:20';
        }
        if ($request->no_hp != $pegawai->no_hp) {
            $rules['no_hp'] = 'required|integer|unique:pegawais|max:20';
        }
        $validatedData = $request->validate($rules);

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
