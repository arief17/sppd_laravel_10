<?php

namespace App\Http\Controllers;

use App\Models\AlatAngkut;
use App\Models\DataPerdin;
use App\Models\Area;
use App\Models\Ketentuan;
use App\Models\KotaKabupaten;
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
            'areas' => Area::all(),
            'tanda_tangans' => TandaTangan::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }
    
    public function getKotaKabupaten($areaId)
    {
        $area = Area::find($areaId);
        
        if (!$area) {
            return response()->json([]);
        }
        
        $kotaKabupatens = [];
        
        if ($area->slug == 'dalam-daerah') {
            $kotaKabupatens = $area->provinsis->flatMap->kota_kabupatens->pluck('nama', 'id');
        } elseif ($area->slug == 'perjalanan-dinas-biasa') {
            $kotaKabupatens = $area->provinsis->pluck('nama', 'id');
        }
        
        return response()->json($kotaKabupatens);
    }
    
    public function getPegawaiInfo($kotaKabupatenId, $alatAngkutId, $pegawaiId)
    {
        $pegawai = Pegawai::find($pegawaiId);
        $pegawaiGolongan = str_replace('-', '_', $pegawai->golongan->slug);

        $uangHarian = UangHarian::where('wilayah_id', $kotaKabupatenId)->value($pegawaiGolongan);
        $uangPenginapan = UangPenginapan::where('wilayah_id', $kotaKabupatenId)->value($pegawaiGolongan);
        $uangTransport = UangTransport::where('wilayah_id', $kotaKabupatenId)->where('alat_angkut_id', $alatAngkutId)->value($pegawaiGolongan);
        $totalBiaya = $uangHarian + $uangPenginapan + $uangTransport;
        
        return response()->json(['biaya' => [
            'uang_harian'=> $uangHarian,
            'uang_penginapan'=> $uangPenginapan,
            'uang_transport'=> $uangTransport,
            'total_biaya'=> $totalBiaya,
        ]]);
    }
    
    /**
    * Store a newly created resource in storage.
    */
    
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $validatedData = $request->validate([
                'surat_dari' => 'required',
                'nomor_surat' => 'required|numeric',
                'tgl_surat' => 'required|date',
                'perihal' => 'required',
                'tanda_tangan_id' => 'required',
                'maksud' => 'required',
                'lama' => 'required',
                'tgl_berangkat' => 'required|date',
                'tgl_kembali' => 'required|date',
                'alat_angkut_id' => 'required',
                'area_id' => 'required',
                'kedudukan_id' => 'required',
                'tujuan_id' => 'required',
                'lokasi' => 'required',
                'keterangan' => 'nullable',
                'pegawai_diperintah_id' => 'required',
                'pegawai_mengikuti_id' => 'nullable',
            ]);
            
            $validatedData['slug'] = SlugService::createSlug(DataPerdin::class, 'slug', $request->perihal);
            $validatedData['author_id'] = auth()->user()->id;
            
            $area = Area::find($request->area_id);
            $validatedData['tujuan_id'] = $area->slug === 'dalam-daerah' ? $request->tujuan_id : Provinsi::find($request->tujuan_id)->kota_kabupatens->first()->id;
            
            $selectedPegawaiIds = explode(',', $request->pegawai_mengikuti_id);
            $validatedData['jumlah_pegawai'] = count($selectedPegawaiIds);
            
            $status = StatusPerdin::create();
            $validatedData['status_id'] = $status->id;
            
            $laporan_perdin = LaporanPerdin::create();
            $validatedData['laporan_perdin_id'] = $laporan_perdin->id;
            
            $perdin = DataPerdin::create($validatedData);
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
            'areas' => Area::all(),
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
            'tanda_tangan_id' => 'required',
            'maksud' => 'required',
            'lama' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'alat_angkut_id' => 'required',
            'area_id' => 'required',
            'kedudukan_id' => 'required',
            'tujuan_id' => 'required',
            'lokasi' => 'required',
            'pegawai_diperintah_id' => 'required',
            'biaya' => 'required',
            'keterangan' => '',
            'pegawai_mengikuti_id' => 'required',
        ]);
        
        $validatedData['slug'] = SlugService::createSlug(DataPerdin::class, 'slug', $request->perihal);
        $validatedData['author_id'] = auth()->user()->id;
        
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
        return redirect()->route('data-perdin.index')->with('success', 'Data Perdin berhasil dihapus!');
    }
}
