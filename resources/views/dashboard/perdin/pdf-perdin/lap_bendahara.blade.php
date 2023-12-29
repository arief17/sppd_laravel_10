<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        td {
            padding: 1px 7px 1px 7px;
            vertical-align: top;
        }

        p, td {
            font-size: 17px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
    @foreach ($kwitansi_perdin->pegawais as $pegawai)

    <div style="float: left;">
        <img src="data:image/png;base64,{{ $imgLogo }}" width="80">
    </div>
    <div style="text-align: center;">
        <h2>
            PEMERINTAH PROVINSI BANTEN <br>
            DINAS PEKERJAAN UMUM DAN PENATAAN RUANG
        </h2>
        <small>
            Kawasan Pusat Pemerintahan Provinsi Banten (KP3B) <br>
            Jln. Syekh Nawawi Al Bantani, Palima Serang-Banten Telp.(0254) 267053, Fax.(0254) 267052 Serang
        </small>
    </div>

    <hr style="
    border-top: 3px solid;
    border-bottom: 1px solid;
    padding: 1px 0;
    margin: 10px 0;
    ">

    <div style="margin: 20px;">
        <table style="margin-bottom: 20px;">
            <tr>
                <td>Dari</td>
                <td>: Pengguna Anggaran</td>
            </tr>
            <tr>
                <td>Untuk</td>
                <td>: Bendahara Pengeluaran</td>
            </tr>
        </table>

        <h3 style="text-decoration: underline; font-weight: bold; text-align: center;">SURAT PERINTAH TUGAS</h3>

        <table style="margin-top: 20px; margin-bottom: 20px;">
            <tr>
                <td>Berikan/Keluarkan uang sebesar</td>
                <td>: Rp.</td>
                <td>{{ number_format($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3">({{ strtoupper($kwitansi_perdin->terbilang($pegawai->pivot->uang_harian + $pegawai->pivot->uang_transport + $pegawai->pivot->uang_tiket + $pegawai->pivot->uang_penginapan)) }} Rupiah)</td>
            </tr>
        </table>
        <table style="margin-top: 20px; margin-bottom: 20px;">
            <tr>
                <td>Kepada</td>
                <td>:</td>
                <td>{{ $bendahara->pegawai->nama ?? '' }}</td>
            </tr>
            <tr>
                <td>Keperluan</td>
                <td>:</td>
                <td>
                    <p>{{ $kwitansi_perdin->data_perdin->maksud }}</p>
                    <p>{{ $kwitansi_perdin->data_perdin->tujuan->nama }} pada Tanggal {{ Carbon\Carbon::parse($kwitansi_perdin->data_perdin->tgl_berangkat)->isoFormat('D MMMM YYYY') }}</p>
                    <p>Kode Rekening {{ $kwitansi_perdin->no_rek }}</p>
                    <p>Kegiatan {{ $kwitansi_perdin->kegiatan_sub->kegiatan->nama }}</p>
                    <p>Sub Kegiatan {{ $kwitansi_perdin->kegiatan_sub->nama }}</p>
                </td>
            </tr>
        </table>

        <div style="float: right;">
            <div style="text-align: center;">
                <span>Serang, {{ now()->isoFormat('D MMMM YYYY') }}</span>
                <h4 style="margin-bottom: 70px">
                    Pengguna Anggaran
                </h4>
                <p style="text-decoration: underline; font-weight: bold;">{{ $pegawai->nama }}</p>
                <p>NIP.{{ $pegawai->nip }}</p>
            </div>
        </div>

        @if (!$loop->last)
        <div class="page-break"></div>
        @endif
    </div>
    @endforeach
</body>
</html>