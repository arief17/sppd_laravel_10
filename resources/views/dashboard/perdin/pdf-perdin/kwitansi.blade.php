<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		
		.gap-t td, th {
			padding: 5px;
			vertical-align: top;
		}
		
		p, td {
			font-size: 13px;
		}
		
		ul {
			list-style-type: none;
			padding-left: 0;
		}
		
		ul li {
			padding-left: 10px;
			text-indent: -9px;
		}
		
		ul li::before {
			content: "\003A";
			margin-right: 1px;
		}
	</style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
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
	
	<div style="text-align: center; margin: 0 0 5px 0;">
		<h1 style="text-decoration: underline; word-spacing: 5px;">K U I T A N S I</h1>
	</div>
	
	<table class="gap-t" style="width: 100%; border-collapse: collapse;">
		<tr>
			<td style="white-space: nowrap;">SUDAH TERIMA DARI</td>
			<td colspan="5">: Bendahara Pengeluaran Dinas Pekerjaan Umum dan Penataan Ruang Provinsi Banten</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">TERBILANG</td>
			<td colspan="5">: Empat Ratus Ribu Rupiah</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">UNTUK PEMBAYARAN</td>
			<td colspan="5">: Biaya perjalanan dinas Sdr {{ $kwitansi_perdin->data_perdin->pegawai_diperintah->nama }} Ke {{ $kwitansi_perdin->data_perdin->tujuan->nama }} selama {{ $kwitansi_perdin->data_perdin->lama }} hari</td>
		</tr>
		<tr>
			<td></td>
			<td style="white-space: nowrap;">Sesuai SPPD Nomor</td>
			<td colspan="4">: 090/SPT.116.11/Sek-DPUPR/2023 tanggal 27 Juni 2023</td>
		</tr>
		<tr>
			<td></td>
			<td>dengan perincian sbb</td>
			<td>:</td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				Uang Harian
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($kwitansi_perdin->totalUangHarian, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				Uang Transport
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($kwitansi_perdin->totalUangTransport, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				Uang Tiket
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($kwitansi_perdin->totalUangTiket, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				Uang Penginapan
			</td>
			<td style="border-bottom: 1px solid black;">Rp.</td>
			<td style="text-align: right; border-bottom: 1px solid black;">{{ number_format($kwitansi_perdin->totalUangPenginapan, 2, ',', '.') }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td style="white-space: nowrap;">
				<span style="margin: 0 20px 0 70px;">-</span>
				Total
			</td>
			<td>Rp.</td>
			<td style="text-align: right;">{{ number_format($kwitansi_perdin->totalSemua, 2, ',', '.') }}</td>
		</tr>
		
		<tr>
			<td style="white-space: nowrap;">Kegiatan</td>
			<td colspan="5">
				<ul>
					<li>
						{{ $kwitansi_perdin->kegiatan->nama }}
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">Sub Kegiatan</td>
			<td colspan="5">
				<ul>
					<li>
						Penyusunan Rencana Teknis dan Dokumen Lingkungan Hidup untuk Kontruksi Bendungan, Embung, dan Bangunan Penampung Air Lainnya
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">Kode Rekening</td>
			<td colspan="5">: {{ $kwitansi_perdin->no_rek }}</td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="text-align: center;">PPTK</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;" colspan="3">
				JUMLAH
				<span style="padding: 0 20px 0 50px;">Rp.</span>
				{{ number_format($kwitansi_perdin->totalSemua, 2, ',', '.') }}
			</td>
			<td colspan="3" style="padding-top: 80px;"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>
	
	<table class="gap-t" style="width: 100%; border-collapse: collapse; margin-top: 50px;">
		<tr>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">MENGETAHUI/SETUJU DIBAYAR</span><br>
				{!! $kwitansi_perdin->data_perdin->ttdFormated !!}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">LUNAS DIBAYAR</span><br>
				Bendahara Pengeluaran
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">YANG MENERIMA</span><br>
			</td>
		</tr>
		<tr>
			<td style="padding-top: 70px;" colspan="3"></td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nip }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">Luki Haidin sdf.sdf</span><br>
				NIP. 142345675685794565
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>
</body>
</html>