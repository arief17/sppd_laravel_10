<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		
		.gap-t td {
			padding: 0.5px;
		}

		p, td {
			font-size: 15px;
		}
	</style>
</head>
<body style="font-family: Times, serif; margin: 30px;">
	<table class="gap-t" style="border-collapse: collapse; border: 1px solid black;"">
		<tr>
			<td style="border: 1px solid black; width: 50%;"></td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="4" style="vertical-align: top; width: 1%;">I.</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Berangkat dari</td>
						<td>: {{ $data_perdin->kedudukan->nama }}</td>
					</tr>
					<tr>
						<td colspan="2">(Tempat Kedudukan)</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Ke</td>
						<td>: {{ $data_perdin->tujuan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->formatLocalized('%d %B %Y') }}</td>
					</tr>
				</table>
				<div style="text-align: center;">
					<p style="margin: 10px 0 50px 0;">{{ $data_perdin->tanda_tangan->pegawai->jabatan->nama }}</p>
					
					<p style="text-decoration: underline; font-weight: bold;">{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
					<p>NIP.{{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
				</div>
			</td>
		</tr>
		<tr>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="4" style="vertical-align: top; width: 1%;">II.</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Tiba di</td>
						<td>: {{ $data_perdin->tujuan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_berangkat)->formatLocalized('%d %B %Y') }}</td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Berangkat dari</td>
						<td>: {{ $data_perdin->tujuan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Ke</td>
						<td>: {{ $data_perdin->kedudukan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->formatLocalized('%d %B %Y') }}</td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="4" style="vertical-align: top; width: 1%;">III.</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="4" style="vertical-align: top; width: 1%;">IV.</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="4" style="vertical-align: top; width: 1%;">V.</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Tiba di</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Berangkat dari</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Ke</td>
						<td>: </td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: </td>
					</tr>
					<tr>
						<td colspan="2">Kepala</td>
					</tr>
					<tr>
						<td colspan="2">
							<p style="padding-top: 50px;">
								(................................................) <br>
								NIP.
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td style="border: 1px solid black; width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="4" style="vertical-align: top; width: 1%;">VI.</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Tiba di</td>
						<td>: {{ $data_perdin->kedudukan->nama }}</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 20px;">Pada Tanggal</td>
						<td>: {{ Carbon\Carbon::parse($data_perdin->tgl_kembali)->formatLocalized('%d %B %Y') }}</td>
					</tr>
				</table>
				<div style="text-align: center;">
					<p style="margin: 10px 0 50px 0;">{{ $data_perdin->tanda_tangan->pegawai->jabatan->nama }}</p>
					
					<p style="text-decoration: underline; font-weight: bold;">{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
					<p>NIP.{{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
				</div>
			</td>
			<td style="border: 1px solid black; width: 50%;">
				<p style="padding-left: 20px;">Telah diperiksa dengan keterangan bahwa perjalan tersebut atas perintahnya dan semata mata untuk kepentingan jabatan dalam waktu sesingkat-singkatnya</p>
				<div style="text-align: center;">
					<p style="margin: 10px 0 50px 0;">{{ $data_perdin->tanda_tangan->pegawai->jabatan->nama }}</p>
					
					<p style="text-decoration: underline; font-weight: bold;">{{ $data_perdin->tanda_tangan->pegawai->nama }}</p>
					<p>NIP.{{ $data_perdin->tanda_tangan->pegawai->nip }}</p>
				</div>
			</td>
		</tr>
	</table>

	<p style="margin-top: 10px;">VII. <b>PERHATIAN</b></p>
	<p>Pejabat yang berwenang menertibkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang menentukan tanggal berangkat/tiba, serta bendaharawan, bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara, apabila menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</p>
</body>
</html>
