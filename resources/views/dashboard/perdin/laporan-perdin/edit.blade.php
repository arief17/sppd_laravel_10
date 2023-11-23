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
					@if ($laporan_perdin->data_perdin->status->lap)
					<tr>
						<td colspan="2">
							<div class="text-center">
								<a class="btn btn-secondary px-5" href="{{ route('lap-pdf', $laporan_perdin->id) }}">
									<i class="fa fa-file"></i>
									Cetak Laporan
								</a>
							</div>
						</td>
					</tr>
					@endif
					<tr>
						<td class="align-middle">Tanggal Laporan</td>
						<td>
							<input name="tgl_laporan" value="{{ old('tgl_laporan', $laporan_perdin->tgl_laporan) }}" type="date" class="form-control @error('tgl_laporan') is-invalid @enderror" id="tgl_laporan" placeholder="Masukan tgl_laporan">
							@error('tgl_laporan')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Sehubungan adanya Surat Dari {{ $laporan_perdin->data_perdin->surat_dari }} mengenai {{ $laporan_perdin->data_perdin->perihal }} Nomor {{ $laporan_perdin->data_perdin->nomor_surat }} pada {{ Carbon\Carbon::parse($laporan_perdin->data_perdin->tgl_surat)->formatLocalized('%d %B %Y') }} maka kami akan melaksanakan perjalanan dinas untuk mengidentifikasi masalah tersebut.															</td>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="fw-bold">A. Dasar Hukum Perjalanan Dinas</td>
					</tr>
					<tr>
						<td colspan="2">Surat Perintah Tugas dari Atas Nama {{ $laporan_perdin->data_perdin->tanda_tangan->pegawai->seksi->nama }}</td>
					</tr>
					<tr>
						<td class="align-middle">Nomor</td>
						<td>
							<input name="nomor_surat" value="{{ old('nomor_surat', $laporan_perdin->nomor_surat) }}" type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" placeholder="Masukan nomor_surat">
							@error('nomor_surat')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
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
							<textarea name="maksud" class="form-control @error('maksud') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('maksud', $laporan_perdin->maksud) }}</textarea>
							@error('maksud')
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
							<textarea name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kegiatan', $laporan_perdin->kegiatan) }}</textarea>
							@error('kegiatan')
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
							<textarea name="hasil" class="form-control @error('hasil') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('hasil', $laporan_perdin->hasil) }}</textarea>
							@error('hasil')
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
							<textarea name="kesimpulan" class="form-control @error('kesimpulan') is-invalid @enderror" placeholder="Masukan Maksud" rows="3">{{ old('kesimpulan', $laporan_perdin->kesimpulan) }}</textarea>
							@error('kesimpulan')
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
		{{-- <h3>Cetak Laporan</h3>
			<section>
				<div class="text-center">
					<a class="btn btn-secondary px-5" href="{{ route('lap-pdf', $laporan_perdin->id) }}">
						<i class="fa fa-file"></i>
						Cetak Laporan
					</a>
				</div>
			</section> --}}
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