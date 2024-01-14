<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function rekap_pegawai() {
        $pegawais = Pegawai::all();
        $rekaps = [];

        foreach ($pegawais as $pegawai) {
            $nama = $pegawai->nama;
            $jumlah_sppd = $pegawai->ketentuan->jumlah_perdin;

            $jumlah_uang = ($pegawai->pivot->uang_harian ?? 0) +
            ($pegawai->pivot->uang_transport ?? 0) +
            ($pegawai->pivot->uang_tiket ?? 0) +
            ($pegawai->pivot->uang_penginapan ?? 0);

            $rekaps[] = (object) [
                'nama' => $nama,
                'jumlah_sppd' => $jumlah_sppd,
                'jumlah_uang' => $jumlah_uang,
            ];
        }

        return view('dashboard.perdin.rekap-data.index', [
            'title' => 'Daftar Rekap Data Pegawai',
            'rekaps' => $rekaps,
        ]);
    }


    public function rekap_bidang() {
        $bidangs = Bidang::all();
        $rekaps = [];

        foreach ($bidangs as $bidang) {
            $nama = $bidang->nama;
            $jumlah_sppd = 0;
            $jumlah_uang = 0;

            foreach ($bidang->pegawais as $pegawai) {
                $jumlah_sppd += $pegawai->ketentuan->jumlah_perdin ?? 0;

                $jumlah_uang += ($pegawai->pivot->uang_harian ?? 0) +
                            ($pegawai->pivot->uang_transport ?? 0) +
                            ($pegawai->pivot->uang_tiket ?? 0) +
                            ($pegawai->pivot->uang_penginapan ?? 0);
            }

            $rekaps[] = (object) [
                'nama' => $nama,
                'jumlah_sppd' => $jumlah_sppd,
                'jumlah_uang' => $jumlah_uang,
            ];
        }

        return view('dashboard.perdin.rekap-data.bidang', [
            'title' => 'Daftar Rekap Data Bidang',
            'rekaps' => $rekaps,
        ]);
    }
}
