<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		
		td {
			padding: 5px;
			vertical-align: top;
		}

		p, td {
			font-size: 15px;
		}
	</style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
	<div style="float: left;">
		<img src="{{ public_path('/assets/img/logo-banten.png') }}" width="80">
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
	
	<div style="margin: 20px 60px 0 60px;">
		
		<div style="text-align: center;">
			<p style="text-decoration: underline; font-weight: bold;">Laporan Hasil Perjalanan Dinas</p>
		</div>
		
		<table style="width: 100%;">
			<tr>
				<td rowspan="7" style="vertical-align: top; width: 1%; font-weight: bold;">I.</td>
				<td colspan="3" style="font-weight: bold;">Pendahuluan</td>
			</tr>
			<tr>
				<td rowspan="4" style="width: 1%; font-weight: bold;">A. </td>
				<td colspan="2" style="font-weight: bold;">Dasar Hukum Perjalanan Dinas</td>
			</tr>
			<tr>
				<td colspan="2">
					Surat Perintah Tugas dari Atas Nama {{ $laporan_perdin->data_perdin->author->seksi->nama }}
				</td>
			</tr>
			<tr>
				<td style="width: 1%;">Nomor</td>
				<td>: {{ $laporan_perdin->data_perdin->nomor_surat }}</td>
			</tr>
			<tr>
				<td style="width: 1%;">Tanggal</td>
				<td>: {{ $laporan_perdin->data_perdin->tgl_surat }}</td>
			</tr>
			<tr>
				<td rowspan="2" style="width: 1%; font-weight: bold;">B. </td>
				<td colspan="2" style="font-weight: bold;">Maksud dan Tujuan</td>
			</tr>
			<tr>
				<td colspan="2">
						{!! nl2br($laporan_perdin->maksud) !!}
				</td>
			</tr>
			<tr>
				<td rowspan="2" style="vertical-align: top; width: 1%; font-weight: bold;">II.</td>
				<td colspan="3" style="font-weight: bold;">Kegiatan yang dilaksanakan</td>
			</tr>
			<tr>
				<td colspan="3">
					<ul style="padding-left: 20px;">
						{!! nl2br($laporan_perdin->kegiatan) !!}
					</ul>
				</td>
			</tr>
			<tr>
				<td rowspan="2" style="vertical-align: top; width: 1%; font-weight: bold;">III.</td>
				<td colspan="3" style="font-weight: bold;">Hasil yang dicapai</td>
			</tr>
			<tr>
				<td colspan="3">
					<ul style="padding-left: 20px;">
						{!! nl2br($laporan_perdin->hasil) !!}
					</ul>
				</td>
			</tr>
			<tr>
				<td rowspan="2" style="vertical-align: top; width: 1%; font-weight: bold;">IV.</td>
				<td colspan="3" style="font-weight: bold;">Kesimpulan dan Saran</td>
			</tr>
			<tr>
				<td colspan="3">
					<ul style="padding-left: 20px;">
						{!! nl2br($laporan_perdin->kesimpulan) !!}
					</ul>
				</td>
			</tr>
			<tr>
				<td rowspan="2" style="vertical-align: top; width: 1%; font-weight: bold;">V.</td>
				<td colspan="3" style="font-weight: bold;">Penutup</td>
			</tr>
			<tr>
				<td colspan="3">
					Demikian laporan hasil perjalanan, atas perhatiannya diucapkan terima kasih.
				</td>
			</tr>
		</table>
		
		<p style="margin: 30px 0 10px 0;">
			Serang, {{ now()->formatLocalized('%d %B %Y') }} <br>
			Yang melaksanakan Tugas
		</p>
		
		<table style="width: 100%;">
			@foreach ($laporan_perdin->data_perdin->pegawai_mengikuti as $pegawai)
			<tr>
				<td style="width: 1%;">{{ $loop->iteration }}.</td>
				<td>
					{{ $pegawai->nama }} <br> 
					NIP.{{ $pegawai->nip }}
				</td>
				<td style="vertical-align: bottom;">{{ $loop->iteration }}........................................</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>