<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		
		.gap-t td, th {
			padding: 1px 5px;
			vertical-align: top;
		}
		
		p, td {
			font-size: 12px;
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
	margin: 10px 0 5px 0;
	">
	
	<div style="text-align: center; margin: 0 0 5px 0;">
		<h2 style="text-decoration: underline; word-spacing: 5px;">K U I T A N S I</h2>
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
			<td colspan="4">: {{ $kwitansi_perdin->data_perdin->no_spt }} tanggal {{ $kwitansi_perdin->data_perdin->tgl_berangkat }}</td>
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
				Uang Akomodasi
			</td>
			<td style="border-bottom: 1px solid black;">Rp.</td>
			<td style="text-align: right; border-bottom: 1px solid black;">{{ number_format($kwitansi_perdin->totalUangAkomodasi, 2, ',', '.') }}</td>
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
						{{ $kwitansi_perdin->kegiatan_sub->kegiatan->nama }}
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">Sub Kegiatan</td>
			<td colspan="5">
				<ul>
					<li>
						{{ $kwitansi_perdin->kegiatan_sub->nama }}
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
			<td colspan="3" style="padding-top: 40px;"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>
	
	<table class="gap-t" style="width: 100%; border-collapse: collapse; margin-top: 30px;">
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
			<td style="padding-top: 40px;" colspan="3"></td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nip }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $bendahara->pegawai->nama }}</span><br>
				NIP. {{ $bendahara->pegawai->nip }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>

	<hr style="margin: 10px 0; border: 1px dashed black;"> {{-- Pemisah --}}

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
	margin: 10px 0 5px 0;
	">
	
	<div style="text-align: center; margin: 0 0 5px 0;">
		<h2 style="text-decoration: underline; word-spacing: 5px;">K U I T A N S I</h2>
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
			<td colspan="4">: {{ $kwitansi_perdin->data_perdin->no_spt }} tanggal {{ $kwitansi_perdin->data_perdin->tgl_berangkat }}</td>
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
				Uang Akomodasi
			</td>
			<td style="border-bottom: 1px solid black;">Rp.</td>
			<td style="text-align: right; border-bottom: 1px solid black;">{{ number_format($kwitansi_perdin->totalUangAkomodasi, 2, ',', '.') }}</td>
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
						{{ $kwitansi_perdin->kegiatan_sub->kegiatan->nama }}
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style="white-space: nowrap;">Sub Kegiatan</td>
			<td colspan="5">
				<ul>
					<li>
						{{ $kwitansi_perdin->kegiatan_sub->nama }}
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
			<td colspan="3" style="padding-top: 40px;"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>
	
	<table class="gap-t" style="width: 100%; border-collapse: collapse; margin-top: 30px;">
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
			<td style="padding-top: 40px;" colspan="3"></td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->data_perdin->tanda_tangan->pegawai->nip }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $bendahara->pegawai->nama }}</span><br>
				NIP. {{ $bendahara->pegawai->nip }}
			</td>
			<td style="text-align: center;">
				<span style="text-decoration: underline;">{{ $kwitansi_perdin->pptk->nama }}</span><br>
				NIP. {{ $kwitansi_perdin->pptk->nip }}
			</td>
		</tr>
	</table>
</body>
</html>