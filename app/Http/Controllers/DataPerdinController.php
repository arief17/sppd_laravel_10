<?php

namespace App\Http\Controllers;

use App\Models\AlatAngkut;
use App\Models\DataPerdin;
use App\Models\JenisPerdin;
use App\Models\Ketentuan;
use App\Models\KotaKabupaten;
use App\Models\KwitansiPerdin;
use App\Models\LaporanPerdin;
use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\StatusPerdin;
use App\Models\TandaTangan;
use App\Models\UangHarian;
use App\Models\UangPenginapan;
use App\Models\UangTransport;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPerdinController extends Controller

{
    public function getTujuan($jenisPerdinId)
    {
        $tujuan = [];
        $jenisPerdin = JenisPerdin::find($jenisPerdinId);
        
        if ($jenisPerdin->slug === 'perjalanan-dinas-dalam-kota') {
            $tujuan = $jenisPerdin->kota_kabupatens->pluck('nama', 'id');
        } elseif ($jenisPerdin->slug === 'perjalanan-dinas-biasa') {
            $dalamLuarValue = request()->query('dalam_luar');
            
            if ($dalamLuarValue === 'Dalam Provinsi') {
                $tujuan = $jenisPerdin->kota_kabupatens->pluck('nama', 'id');
            } elseif ($dalamLuarValue === 'Luar Provinsi') {
                $tujuan = $jenisPerdin->provinsis->pluck('nama', 'id');
            }
        }
        
        return response()->json($tujuan);
    }
    
    public function getPegawaiInfo($kotaKabupatenId, $pegawaiId)
    {
        $pegawai = Pegawai::find($pegawaiId);
        $pegawaiGolongan = str_replace('-', '_', $pegawai->golongan->slug);
        $uangHarian = UangHarian::where('wilayah_id', $kotaKabupatenId)->value($pegawaiGolongan);
        
        return response()->json(['data_pegawai' => [
            'nip' => $pegawai->nip,
            'jabatan' => $pegawai->jabatan->nama,
            'uang_harian'=> $uangHarian,
            ]
        ]);
    }
    
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
            'pegawais' => Pegawai::whereNotNull('golongan_id')->get(),
        ]);
    }
    
    /**
    * Store a newly created resource in storage.
    */
    
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $validatedData = $request->validate([
                'surat_dari' => 'nullable',
                'nomor_surat' => 'nullable|numeric',
                'tgl_surat' => 'nullable|date',
                'perihal' => 'nullable',
                'tanda_tangan_id' => 'required',
                'maksud' => 'required',
                'lama' => 'required',
                'tgl_berangkat' => 'required|date',
                'tgl_kembali' => 'required|date',
                'alat_angkut_id' => 'required',
                'jenis_perdin_id' => 'required',
                'tujuan_id' => 'required',
                'lokasi' => 'required',
                'pegawai_diperintah_id' => 'required',
                'pegawai_mengikuti_id' => 'nullable',
            ]);
            
            $validatedData['slug'] = SlugService::createSlug(DataPerdin::class, 'slug', $request->maksud);
            $validatedData['author_id'] = auth()->user()->id;
            $validatedData['kedudukan_id'] = KotaKabupaten::where('nama', 'LIKE', '%' . $request->kedudukan_id . '%')->value('id');
            
            $jenis_perdin = JenisPerdin::find($request->jenis_perdin_id);
            $tujuan = null;
            
            if ($jenis_perdin->slug === 'perjalanan-dinas-dalam-kota') {
                $tujuan = KotaKabupaten::find($request->tujuan_id);
            } elseif ($jenis_perdin->slug === 'perjalanan-dinas-biasa') {
                if ($request->dalamLuar === 'Dalam Provinsi') {
                    $tujuan = KotaKabupaten::find($request->tujuan_id);
                } elseif ($request->dalamLuar === 'Luar Provinsi') {
                    $tujuan = Provinsi::find($request->tujuan_id);
                }
            }
            $validatedData['tujuan_type'] = get_class($tujuan);
            $validatedData['tujuan_id'] = $tujuan->id;
            
            $selectedPegawaiIds = explode(',', $request->pegawai_mengikuti_id);
            $validatedData['jumlah_pegawai'] = count($selectedPegawaiIds);
            
            $status = StatusPerdin::create();
            $validatedData['status_id'] = $status->id;
            
            $laporan_perdin = LaporanPerdin::create();
            $validatedData['laporan_perdin_id'] = $laporan_perdin->id;

            $kwitansi_perdin = KwitansiPerdin::create();
            $validatedData['kwitansi_perdin_id'] = $kwitansi_perdin->id;

            foreach ($selectedPegawaiIds as $pegawaiId) {
                $pegawai = Pegawai::find($pegawaiId);
                $pegawaiGolongan = str_replace('-', '_', $pegawai->golongan->slug);
                $uangHarian = UangHarian::where('wilayah_id', $validatedData['tujuan_id'])->where('wilayah_type', $validatedData['tujuan_type'])->value($pegawaiGolongan);
                $uangTransport = UangTransport::where('wilayah_id', $validatedData['tujuan_id'])->where('wilayah_type', $validatedData['tujuan_type'])->value($pegawaiGolongan);
                $uangTiket = UangTransport::where('wilayah_id', $validatedData['tujuan_id'])->where('wilayah_type', $validatedData['tujuan_type'])->value('harga_tiket');
                $uangPenginapan = UangPenginapan::where('wilayah_id', $validatedData['tujuan_id'])->where('wilayah_type', $validatedData['tujuan_type'])->value($pegawaiGolongan);
                
                $kwitansi_perdin->pegawais()->attach($pegawaiId, [
                    'uang_harian' => $uangHarian ?? 0,
                    'uang_transport' => $uangTransport ?? 0,
                    'uang_tiket' => $uangTiket ?? 0,
                    'uang_penginapan' => $uangPenginapan ?? 0,
                ]);
            }
            
            $perdin = DataPerdin::create($validatedData);
            
            $pegawaiDiperintahId = $request->pegawai_diperintah_id;
            $selectedPegawaiIds = array_diff($selectedPegawaiIds, [$pegawaiDiperintahId]);
            if($selectedPegawaiIds){
                $perdin->pegawai_mengikuti()->attach($selectedPegawaiIds);
            }
            
            $allKetentuanIds = collect([$perdin->pegawai_diperintah->ketentuan_id])->merge($perdin->pegawai_mengikuti->pluck('ketentuan_id'))->unique();
            $ketentuans = Ketentuan::whereIn('id', $allKetentuanIds)->get();
            $pegawaiBatasMaksimal = [];
            
            foreach ($ketentuans as $ketentuan) {
                if ($ketentuan->jumlah_perdin >= $ketentuan->max_perdin) {
                    $pegawaiBatasMaksimal[] = $ketentuan->pegawai->nama;
                }
            }
            
            if (!empty($pegawaiBatasMaksimal)) {
                return redirect()->back()->withInput()->with('failedSave', implode(', ', $pegawaiBatasMaksimal) . ' telah mencapai batas maksimal perdin!');
            }
            
            Ketentuan::whereIn('id', $allKetentuanIds)->increment('jumlah_perdin');
            
            return redirect()->route('data-perdin.index', 'baru')->with('success', 'Data Perdin berhasil ditambahkan!');
        }, 2);
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
            'surat_dari' => 'nullable',
            'nomor_surat' => 'numeric',
            'tgl_surat' => 'date',
            'perihal' => 'nullable',
            'tanda_tangan_id' => 'required',
            'maksud' => 'required',
            'lama' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'alat_angkut_id' => 'required',
            'jenis_perdin_id' => 'required',
            'tujuan_id' => 'required',
            'lokasi' => 'required',
            'pegawai_diperintah_id' => 'required',
            'biaya' => 'required',
            'pegawai_mengikuti_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(DataPerdin::class, 'slug', $request->perihal);
        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['kedudukan_id'] = KotaKabupaten::where('nama', 'LIKE', '%' . $request->kedudukan_id . '%')->value('id');
        
        $selectedPegawaiIds = explode(',', $request->pegawai_mengikuti_id);
        $validatedData['jumlah_pegawai'] = count($selectedPegawaiIds);
        
        $dataPerdin->update($validatedData);
        $dataPerdin->pegawai_mengikuti()->sync($selectedPegawaiIds);
        
        return redirect()->route('data-perdin.index', 'baru')->with('success', 'Data Perdin berhasil diperbarui!');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(DataPerdin $dataPerdin)
    {
        $dataPerdin->delete();
        return redirect()->route('data-perdin.index', 'baru')->with('success', 'Data Perdin berhasil dihapus!');
    }
}
