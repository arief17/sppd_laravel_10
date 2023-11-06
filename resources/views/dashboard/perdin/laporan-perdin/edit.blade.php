@extends('layouts.embed')

@section('container')

<form id="laporanForm" action="{{ route('laporan-perdin.update', $laporan_perdin->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('put')
	
	<div id="wizard3">
		<h3>Pendahuluan</h3>
		<section>
			<div class="table-responsive mg-t-20">
				<table class="table mg-b-0 text-md-nowrap">
					<tr>
						<td class="align-middle">Tanggal Laporan</td>
						<td>
							{{ now()->formatLocalized('%d %B %Y') }}
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Sehubungan adanya Surat Dari Seksi Administrasi mengenai Pengantaran PKL Nomor 901390 pada tanggal 14 Oktober 2023 maka kami akan melaksanakan perjalanan dinas untuk mengidentifikasi masalah tersebut.															</td>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="fw-bold">A. Dasar Hukum Perjalanan Dinas</td>
					</tr>
					<tr>
						<td colspan="2">Surat Perintah Tugas dari Atas Nama Kepala Dinas Pekerjaan Umum dan Penataan Ruang.</td>
					</tr>
					<tr>
						<td class="align-middle">Nomor</td>
						<td>
							{{ $laporan_perdin->data_perdin->nomor_surat }}
						</td>
					</tr>
					<tr>
						<td class="align-middle">Tanggal</td>
						<td>{{ $laporan_perdin->data_perdin->tgl_surat }}</td>
					</tr>
					<tr><td></td><td></td></tr>
				</table>
			</div>
		</section>
		<h3>Maksud & Tujuan</h3>
		<section>
			<div class="table-responsive mg-t-20">
				<table class="table mg-b-0 text-md-nowrap">
					<tr>
						<td class="fw-bold">B. Madsud dan Tujuan</td>
					</tr>
					<tr>
						<td>
							<textarea name="maksud1" class="form-control @error('maksud1') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('maksud1', $laporan_perdin->maksud1) }}</textarea>
							@error('maksud1')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="maksud2" class="form-control @error('maksud2') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('maksud2', $laporan_perdin->maksud2) }}</textarea>
							@error('maksud2')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="maksud3" class="form-control @error('maksud3') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('maksud3', $laporan_perdin->maksud3) }}</textarea>
							@error('maksud3')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr><td></td></tr>
				</table>
			</div>
		</section>
		<h3>Kegiatan yang dilaksanakan</h3>
		<section>
			<div class="table-responsive mg-t-20">
				<table class="table mg-b-0 text-md-nowrap">
					<tr>
						<td class="fw-bold">Kegiatan yang dilaksanakan</td>
					</tr>
					<tr>
						<td>
							<textarea name="kegiatan1" class="form-control @error('kegiatan1') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kegiatan1', $laporan_perdin->kegiatan1) }}</textarea>
							@error('kegiatan1')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="kegiatan2" class="form-control @error('kegiatan2') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kegiatan2', $laporan_perdin->kegiatan2) }}</textarea>
							@error('kegiatan2')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="kegiatan3" class="form-control @error('kegiatan3') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kegiatan3', $laporan_perdin->kegiatan3) }}</textarea>
							@error('kegiatan3')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr><td></td></tr>
				</table>
			</div>
		</section>
		<h3>Hasil yang dicapai</h3>
		<section>
			<div class="table-responsive mg-t-20">
				<table class="table mg-b-0 text-md-nowrap">
					<tr>
						<td class="fw-bold">Hasil yang dicapai</td>
					</tr>
					<tr>
						<td>
							<textarea name="hasil1" class="form-control @error('hasil1') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('hasil1', $laporan_perdin->hasil1) }}</textarea>
							@error('hasil1')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="hasil2" class="form-control @error('hasil2') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('hasil2', $laporan_perdin->hasil2) }}</textarea>
							@error('hasil2')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="hasil3" class="form-control @error('hasil3') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('hasil3', $laporan_perdin->hasil3) }}</textarea>
							@error('hasil3')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr><td></td></tr>
				</table>
			</div>
		</section>
		<h3>Kesimpulan & Saran</h3>
		<section>
			<div class="table-responsive mg-t-20">
				<table class="table mg-b-0 text-md-nowrap">
					<tr>
						<td class="fw-bold">Kesimpulan & Saran</td>
					</tr>
					<tr>
						<td>
							<textarea name="kesimpulan1" class="form-control @error('kesimpulan1') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kesimpulan1', $laporan_perdin->kesimpulan1) }}</textarea>
							@error('kesimpulan1')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="kesimpulan2" class="form-control @error('kesimpulan2') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kesimpulan2', $laporan_perdin->kesimpulan2) }}</textarea>
							@error('kesimpulan2')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="kesimpulan3" class="form-control @error('kesimpulan3') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kesimpulan3', $laporan_perdin->kesimpulan3) }}</textarea>
							@error('kesimpulan3')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr><td></td></tr>
				</table>
			</div>
		</section>
		<h3>Upload File</h3>
		<section>
			<label for="file_laporan" class="form-label">File Laporan</label>
			<input type="hidden" name="oldLaporan" value="{{ $laporan_perdin->file_laporan }}">
			<input name="file_laporan" class="form-control @error('file_laporan') is-invalid @enderror" type="file" id="file_laporan">
			@error('file_laporan')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
			@enderror
		</section>
		<h3>Cetak Laporan</h3>
		<section>
			<div class="text-center">
				<a class="btn btn-secondary px-5" href="{{ route('lap-pdf', $laporan_perdin->id) }}">
					<i class="fa fa-file"></i>
					Cetak Laporan
				</a>
			</div>
		</section>
	</div>
</form>

@endsection

@section('js')

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="ti-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Internal Jquery.steps js -->
<script src="/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
<script src="/assets/plugins/parsleyjs/parsley.min.js"></script>

<!--Internal  Form-wizard js -->
<script src="/assets/js/form-wizard.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

<!-- Sweet-alert js  -->
<script src="/assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>

<script>
	$(document).ready(function() {
		let finishButton = $('a[href="#finish"]');
		let form = $('#laporanForm');
		
		finishButton.click(function(e) {
			e.preventDefault();
			form.submit();
		});
	});
</script>

@if(session()->has('success'))
<script>
	$(document).ready(function() {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 10000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});
		
		Toast.fire({
			icon: 'success',
			title: '{{ session('success') }}'
		});
	});
</script>
@endif

@endsection