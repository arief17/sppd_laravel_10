<?php

namespace App\Http\Controllers;

use App\Models\AlatAngkut;
use App\Models\DataPerdin;
use App\Models\JenisPerdin;
use App\Models\KotaKabupaten;
use App\Models\LaporanPerdin;
use App\Models\Pegawai;
use App\Models\StatusPerdin;
use App\Models\TandaTangan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DataPerdinController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index($status = null)
    {
        $data_perdins = DataPerdin::filterByStatus($status);
        
        return view('dashboard.perdin.data-perdin.index', [
            'title' => 'Daftar Data Perdin',
            'data_perdins' => $data_perdins,
        ]);
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('dashboard.perdin.data-perdin.create', [
            'title' => 'Tambah Data Perdin',
            'kota_kabupatens' => KotaKabupaten::all(),
            'alat_angkuts' => AlatAngkut::all(),
            'jenis_perdins' => JenisPerdin::all(),
            'tanda_tangans' => TandaTangan::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'surat_dari' => 'required',
            'nomor_surat' => 'required|numeric',
            'tgl_surat' => 'required|date',
            'perihal' => 'required',
            'no_spt' => 'required|numeric',
            'tanda_tangan_id' => 'required',
            'maksud' => 'required',
            'lama' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'alat_angkut_id' => 'required',
            'jenis_perdin_id' => 'required',
            'kedudukan_id' => 'required',
            'tujuan_id' => 'required',
            'lokasi' => 'required',
            'pegawai_diperintah_id' => 'required',
            'biaya' => 'required',
            'keterangan' => 'required',
            'pegawai_mengikuti_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(DataPerdin::class, 'slug', $request->perihal);
        $validatedData['author_id'] = auth()->user()->id;
        
        $selectedPegawaiIds = explode(',', $request->pegawai_mengikuti_id);
        $validatedData['jumlah_pegawai'] = count($selectedPegawaiIds);
        
        $status = StatusPerdin::create();
        $validatedData['status_id'] = $status->id;
        $laporan_perdin = LaporanPerdin::create();
        $validatedData['laporan_perdin_id'] = $laporan_perdin->id;
        
        $perdin = DataPerdin::create($validatedData);
        $perdin->pegawai_mengikuti()->attach($selectedPegawaiIds);
        
        return redirect()->route('data-perdin.indexBaru')->with('success', 'Data Perdin berhasil ditambahkan!');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(DataPerdin $dataPerdin)
    {
        return view('dashboard.perdin.data-perdin.show', [
            'title' => 'Detail Data Perdin',
            'data_perdin' => $dataPerdin,
        ]);
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(DataPerdin $dataPerdin)
    {
        return view('dashboard.perdin.data-perdin.edit', [
            'title' => 'Perbarui Data Perdin',
            'data_perdin' => $dataPerdin,
            'kota_kabupatens' => KotaKabupaten::all(),
            'alat_angkuts' => AlatAngkut::all(),
            'jenis_perdins' => JenisPerdin::all(),
            'tanda_tangans' => TandaTangan::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, DataPerdin $dataPerdin)
    {
        $validatedData = $request->validate([
            'surat_dari' => 'required',
            'nomor_surat' => 'required|numeric',
            'tgl_surat' => 'required|date',
            'perihal' => 'required',
            'no_spt' => 'required|numeric',
            'tanda_tangan_id' => 'required',
            'maksud' => 'required',
            'lama' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'alat_angkut_id' => 'required',
            'jenis_perdin_id' => 'required',
            'kedudukan_id' => 'required',
            'tujuan_id' => 'required',
            'lokasi' => 'required',
            'pegawai_diperintah_id' => 'required',
            'biaya' => 'required',
            'pegawai_mengikuti_id' => 'required',
            'jumlah_pegawai' => 'required',
            'keterangan' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(DataPerdin::class, 'slug', $request->perihal);
        $validatedData['author_id'] = auth()->user()->id;
        
        
        DataPerdin::where('id', $dataPerdin->id)->update($validatedData);
        return redirect()->route('data-perdin.index')->with('success', 'Data Perdin berhasil diperbarui!');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(DataPerdin $dataPerdin)
    {
        $dataPerdin->delete();
        return redirect()->route('data-perdin.index')->with('success', 'Data Perdin berhasil dihapus!');
    }
}
